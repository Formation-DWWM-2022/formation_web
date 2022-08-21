const pokedex = document.getElementById('pokedex');
const user_id = 'totoman18';
const playlist_id = `3JBZmo7q8WxOiufCvqIvmE`;
const accessToken = 'BQD0-WYkJHvT5BkBBc_XcvnYjGDaWKNXAJZPB6i4mIg1pX1rBEY_3vrp4Joh8936431hzocfxApiLRijXWMxldAhRCNZiV5vf0CZeVbrsoNVIlgrjR5mloqP1nIgdCs5IG-UXepTNXta2iyAzrE5_bb25hL24TCQteuz-4iqZiZz1g';
const consumer_key = 'hTplvntDbREwGcqRXjrP';
const consumer_secret = 'fAAuWwRtvrQGstWyDeZqiOfvOvOnRKoi';

const fetchPokemon = () => {
    let promises = [];
    // const url = `https://api.spotify.com/v1/users/${user_id}/playlists`;
    const url = `https://api.spotify.com/v1/playlists/${playlist_id}/tracks`;
    promises.push(
        fetch(url, {
            method: 'GET', headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json',
                'Authorization': 'Bearer ' + accessToken
            }
        })
            .then(
                (res) => res.json()
            )
    );
    Promise.all(promises).then((results) => {
        console.log(results);
        for (item of results[0].items) {
            console.log(item.track.name);
            fetchDiscogs(item.track.name)
        }
    });
};


const fetchDiscogs = (name) => {
    let promises = [];
    const url = `https://api.discogs.com/database/search?q=${name.replace(/ /g, "-").sansAccent()}`;
    promises.push(fetch(url, {
        method: 'GET', headers: {
            'Authorization': 'Discogs key=' + consumer_key + ', secret=' + consumer_secret,
            'Access-Control-Allow-Origin': '*'
        }
    })
        .then(
            (res) => res.json()
        ), sleep(3000)


    );
    Promise.all(promises).then((results) => {
        console.log(results);
    });
}

const sleep = (delay, resolveValue) => new Promise((resolve) => {
    setTimeout(() => resolve(resolveValue), delay);
});


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

fetchPokemon();