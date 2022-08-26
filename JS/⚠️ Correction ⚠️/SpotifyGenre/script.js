// https://developer.spotify.com/console/post-playlist-tracks/?playlist_id=&position=&uris=
const playlist_id = `71v9IFSsguAZlw3WL8Ai5m`;
const accessToken = 'BQA7VDcv5o6O2TkTqlJoaUGo-b2ybC2R9sf2y0o-WyvudTzBtLBU3dqXhAMVeHVJtHD7n9vEoc3uHBQjgobr24_LcBT_gQbMXspcxUDdMMkwoTJsKtup9ryMNVwGX3KrfiMmKKAnH8WizWUjo00f8PlK8fwOHCXchEpu_JOVU5l6Uk8QyC-HM3Y87FvW1oXfKII1sL9CcZP66xAoTR_Lk-Rs_L6XbveRX3-5AwFh_Js';
const consumer_key = 'hTplvntDbREwGcqRXjrP';
const consumer_secret = 'fAAuWwRtvrQGstWyDeZqiOfvOvOnRKoi';

async function fetchPlaylistByURL(url) {
    const response = await fetch(url, {
        method: 'GET',
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json',
            'Authorization': 'Bearer ' + accessToken
        }
    });
    const results = await response.json();
    let all = [...results.items];
    if (results.next != null) {
        r = await fetchPlaylistByURL(results.next);
        all = [...all, ...r];
    }
    return all;
}

async function fetchPlaylist(playlist_id) {
    const url = `https://api.spotify.com/v1/playlists/${playlist_id}/tracks`;
    const response = await fetch(url, {
        method: 'GET',
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json',
            'Authorization': 'Bearer ' + accessToken
        }
    });
    const results = await response.json();
    let all = [...results.items];
    if (results.next != null) {
        r = await fetchPlaylistByURL(results.next);
        all = [...all, ...r];
    }
    return all;
};

async function fetchDiscogs(idmusic, name, artist) {
    const url = `https://api.discogs.com/database/search?q=${name.replace(/ /g, "-").sansAccent()}&artist=${artist.replace(/ /g, "-").sansAccent()}&per_page=1`;
    const response = await fetch(url, {
        method: 'GET',
        headers: {
            'Authorization': 'Discogs key=' + consumer_key + ', secret=' + consumer_secret,
        }
    })
    const results = await response.json();
    for (item of results.results) {
        for (genre of item.style) {
            console.log(item.style);
            checkPlaylist(genre).then(idplaylist => {
                addPlaylist(idmusic, idplaylist, name, artist);
            });
        }
    }
    return results;
};

String.prototype.sansAccent = function() {
    var accent = [
        /[\300-\306]/g, /[\340-\346]/g, // A, a
        /[\310-\313]/g, /[\350-\353]/g, // E, e
        /[\314-\317]/g, /[\354-\357]/g, // I, i
        /[\322-\330]/g, /[\362-\370]/g, // O, o
        /[\331-\334]/g, /[\371-\374]/g, // U, u
        /[\321]/g, /[\361]/g, // N, n
        /[\307]/g, /[\347]/g, // C, c
    ];
    var noaccent = ['A', 'a', 'E', 'e', 'I', 'i', 'O', 'o', 'U', 'u', 'N', 'n', 'C', 'c'];

    var str = this;
    for (var i = 0; i < accent.length; i++) {
        str = str.replace(accent[i], noaccent[i]);
    }

    return str;
}

async function fetchAllPlaylistByUrl(url) {
    let plys = [];
    const response = await fetch(url, {
        method: 'GET',
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json',
            'Authorization': 'Bearer ' + accessToken
        }
    });
    const results = await response.json();
    let all = [...results.items];
    if (results.next != null) {
        r = await fetchAllPlaylistByUrl(results.next);
        all = [...all, ...r];
    }
    for (item of all) {
        plys[item.name] = item.id;
    }
    return plys;
}

async function fetchAllPlaylist() {
    let plys = [];
    const url = `https://api.spotify.com/v1/me/playlists?limit=50`;
    const response = await fetch(url, {
        method: 'GET',
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json',
            'Authorization': 'Bearer ' + accessToken
        }
    });
    const results = await response.json();
    let all = [...results.items];
    if (results.next != null) {
        r = await fetchPlaylistByURL(results.next);
        all = [...all, ...r];
    }
    for (item of all) {
        plys[item.name] = item.id;
    }
    return plys;
}

async function fetchNumberTotalPlaylist() {
    let plys = [];
    const url = `https://api.spotify.com/v1/me/playlists?limit=50`;
    const response = await fetch(url, {
        method: 'GET',
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json',
            'Authorization': 'Bearer ' + accessToken
        }
    });
    const results = await response.json();
    let all = [...results.items];
    if (results.next != null) {
        r = await fetchPlaylistByURL(results.next);
        all = [...all, ...r];
    }
    for (item of all) {
        plys[item.name] = item.tracks.total;
    }
    return plys;
}

async function checkPlaylist(name) {
    plys = await fetchAllPlaylist();
    if (name in plys) {
        return plys[name];
    }
    return false;
}

async function checkInPlaylist(idmusic, idplaylist) {
    return await fetchPlaylist(idplaylist).then(results => {
        for (item of results) {
            if (idmusic == item.track.id) {
                return true;
            }
        }
        return false;
    });
}

async function addPlaylist(idmusic, idplaylist, name, artist) {
    inplaylist = await checkInPlaylist(idmusic, idplaylist);
    if (idplaylist != false && inplaylist == false) {
        const url = `https://api.spotify.com/v1/playlists/${idplaylist}/tracks?uris=spotify:track:${idmusic}`;
        const response = await fetch(url, {
            method: 'POST',
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json',
                'Authorization': 'Bearer ' + accessToken
            }
        });
        const results = await response.json();
        console.log('add', idmusic, idplaylist, name, artist)
    } else {
        console.log('exist', idmusic, idplaylist, name, artist);
    }
}

fetchNumberTotalPlaylist().then(results => {
    console.log(results);
});

fetchPlaylist(playlist_id).then(results => {
    console.log('start');
    let index = -1;
    setInterval(() => {
        console.log(index);
        index++;
        if (index >= results.length) {
            console.log('end');
            return;
        }
        track = results[index].track;
        console.log(track.name, track.artists[0].name);
        fetchDiscogs(track.id, track.name, track.artists[0].name)
    }, 3000)
    return;
});