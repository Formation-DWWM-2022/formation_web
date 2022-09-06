// https://developer.spotify.com/console/post-playlist-tracks/?playlist_id=&position=&uris=
var playlist_id = `2crBeXuMUcwwh0J1cP9jKJ`;
var accessToken = 'BQBqbD_kPpUgN39ncs61zQ8FYw_M382ULP1_shEpFP4KsuTB3Qnc6QiozcP_kuAeVDefmZ-zfFL8zVOQaeS5LweIVU70VFGJy6y1EinXZ8zbXyHQw21Rxj2GMSWSBXhRuJpoQHrgzWzukKv_8mToZ-PPokLRUgBYGxQT3yngX1RDk7qBQuq4zzKAc3pafuj1theRGqo4dfZv7_DWL0U2nv2THy-y9ssxrZwHMXXDUJI';
const consumer_key = 'hTplvntDbREwGcqRXjrP';
const consumer_secret = 'fAAuWwRtvrQGstWyDeZqiOfvOvOnRKoi';
const dev_play = [
    '2crBeXuMUcwwh0J1cP9jKJ', '71v9IFSsguAZlw3WL8Ai5m', '2l95pJBkQk25btE95oA1sX', '6m03fso9H0uGg31WCKyjWq',
    '0zgcyUgSbmmnUKKhrpXifm',
    '1JW9ZkBegfALjI3KM35bck', '1ozCkHu7kbCXxBgQQi1wRU', '1yeqo2RT99TZIKhPRF41iI', '3i0XzjwfqgKR5eqU7fz1QA',
    '4Q1MgqGFnmWVj7TozO8xkx', '42zfnwh6kgQjXZ9VVQLhaW', '4rUrv2uO54SAGlaVLYIdky', '3JBZmo7q8WxOiufCvqIvmE',
    '32gWifXS6ClMFczeQCKUMc', '4LdTiE0oEwocUBJzyEZeQ7', '2iDwhWfs3fGKVG9TwVmCDH', '5YIqPdCE0d0TnRFPoTDbsQ',
    '3sAraEcRxigL1oCDwOweB5', '7gdtG4OtoFF2NeyUfnDrzF', '4oY4DBAwWuGwURw614RgjD'
];
let index_dev_play = getRandomIntInclusive(0, 20);


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
    if (typeof results.error !== 'undefined') {
        showErrorMessage(results.error.message);
    }
    let all = [...results.items];
    if (results.next != null) {
        r = await fetchPlaylistByURL(results.next);
        all = [...all, ...r];
    }
    return all;
};

async function fetchDiscogs(track, idmusic, name, artist) {
    const url = `https://api.discogs.com/database/search?q=${name.replace(/ /g, "-").sansAccent()}&artist=${artist.replace(/ /g, "-").sansAccent()}&per_page=1`;
    const response = await fetch(url, {
        method: 'GET',
        headers: {
            'Authorization': 'Discogs key=' + consumer_key + ', secret=' + consumer_secret,
        }
    })
    const results = await response.json();
    if (results.results.length === 0) {
        affichageMusic(track, styles, null);
    }

    let date = new Date(track.album.release_date);
    let year = date.getFullYear().toString();
    checkPlaylist(year).then(idplaylist => {
        addPlaylist(idmusic, idplaylist, name, artist).then(ok => {
            console.log(ok, idmusic, name, artist, track);
            affichageMusic(track, styles, ok);
        });
    });

    for (item of results.results) {
        for (genre of item.style) {
            var styles = item.style;
            checkPlaylist(genre).then(idplaylist => {
                addPlaylist(idmusic, idplaylist, name, artist).then(ok => {
                    console.log(ok, styles, idmusic, name, artist, track);
                    affichageMusic(track, styles, ok);
                });
            });
        }
    }
    return results;
};

String.prototype.sansAccent = function () {
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
    if (typeof results.error !== 'undefined') {
        showErrorMessage(results.error.message);
    }

    let all = [...results.items];
    if (results.next != null) {
        r = await fetchPlaylistByURL(results.next);
        all = [...all, ...r];
    }
    all.sort(comparePlaylist);
    return all;
}

function comparePlaylist(a, b) {
    if (a.tracks.total > b.tracks.total) {
        return -1;
    }
    if (a.tracks.total < b.tracks.total) {
        return 1;
    }
    return 0;
}


async function checkPlaylist(name) {
    plys = await fetchAllPlaylist();
    if (name in plys) {
        return plys[name];
    } else {
        showErrorMessage('Playlist ' + name + ' not found');
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
    }
    return inplaylist;
}



function affichageMusic(track, styles = [], ok = false) {
    let list_music = document.getElementById("list_music");
    let card = document.createElement("div");
    card.classList.add('col-6');
    let bg = "";
    if (ok == null) {
        bg = "border border-info";
    } else {
        bg = ok ? "border border-danger" : "border border-success";
    }
    card.innerHTML = '<div class="card ' + bg + '"><div class = "card-body "> <h5 class ="card-title " > ' + track.name + ' - ' +
        track.artists[0].name +
        ' </h5> <p class = "card-text" > POPULARITY : ' +
        track.popularity + ' - DATE : ' +
        track.album.release_date + '</p> <a target="_blank" href = "' +
        track.external_urls.spotify + '" class = "btn btn-primary"> GO </a> </div> <div class="card-footer text-muted"> ' +
        styles + '</div> </div>';
    list_music.appendChild(card);
}

function getRandomIntInclusive(min, max) {
    min = Math.ceil(min);
    max = Math.floor(max);
    return Math.floor(Math.random() * (max - min + 1)) + min;
}

function delay(delayInms) {
    return new Promise(resolve => {
        setTimeout(() => {
            resolve(2);
        }, delayInms);
    });
}

async function goAllPlaylist() {
    id_playlist = dev_play[index_dev_play];
    if (id_playlist != '' && id_playlist != null) {
        playlist_id = id_playlist;
    }

    let token_spotify = document.querySelector('#token_spotify').value;
    if (token_spotify != '' && token_spotify != null) {
        accessToken = token_spotify;
    }

    let delayres = await delay(3000);

    fetchPlaylist(playlist_id).then(results => {
        showSuccessMessage('start');
        let index = -1;
        setInterval(() => {
            console.log(index);
            index++;
            if (index >= results.length) {
                showSuccessMessage('end');
                index_dev_play = getRandomIntInclusive(0, 20);
                setTimeout(() => { goAllPlaylist(); }, 3000);
                return;
            }
            track = results[index].track;
            fetchDiscogs(track, track.id, track.name, track.artists[0].name);
        }, 3000);
    });
}


try {
    let go = document.querySelector('#go-sucess');
    let goplaylists = document.querySelector('#go-playlists');
    let goall = document.querySelector('#go-all');

    goall.addEventListener('click', () => {
        goAllPlaylist();
    });

    goplaylists.addEventListener('click', () => {
        let id_playlist = document.querySelector('#id_playlist').value;
        let token_spotify = document.querySelector('#token_spotify').value;

        if (id_playlist != '' && id_playlist != null) {
            playlist_id = id_playlist;
        }

        if (token_spotify != '' && token_spotify != null) {
            accessToken = token_spotify;
        }

        fetchNumberTotalPlaylist().then(results => {
            let div_list_playlist = document.getElementById("list-playlist");
            div_list_playlist.innerHTML = "";
            results.forEach(element => {
                let liid = document.createElement('li');
                let liname = document.createElement('li');
                let litotal = document.createElement('li');
                liid.innerHTML = 'id : ' + element.id;
                liname.innerHTML = 'name : ' + element.name;
                litotal.innerHTML = 'total : ' + element.tracks.total;

                let ul = document.createElement("ul");
                ul.appendChild(liid);
                ul.appendChild(liname);
                ul.appendChild(litotal);

                let li = document.createElement("li");
                li.classList.add("list-group-item");
                li.appendChild(ul);

                div_list_playlist.appendChild(li);
            });
        });
    })
    go.addEventListener('click', () => {
        let id_playlist = document.querySelector('#id_playlist').value;
        let token_spotify = document.querySelector('#token_spotify').value;

        if (id_playlist != '' && id_playlist != null) {
            playlist_id = id_playlist;
        }

        if (token_spotify != '' && token_spotify != null) {
            accessToken = token_spotify;
        }

        fetchPlaylist(playlist_id).then(results => {
            showSuccessMessage('start');
            let index = -1;
            setInterval(() => {
                console.log(index);
                index++;
                if (index >= results.length) {
                    showSuccessMessage('end');
                    return;
                }
                track = results[index].track;
                fetchDiscogs(track, track.id, track.name, track.artists[0].name);
            }, 3000);
        });
    })
} catch (error) {
    console.error(error);
    showErrorMessage(error);
}

function showErrorMessage(error = '') {
    let alert = document.querySelector('#alert');
    let p = document.createElement('p');
    p.innerHTML = error;
    alert.appendChild(p);
}

function showSuccessMessage(success = '') {
    let alert = document.querySelector('#alert');
    let p = document.createElement('p');
    p.innerHTML = success;
    alert.appendChild(p);
} 