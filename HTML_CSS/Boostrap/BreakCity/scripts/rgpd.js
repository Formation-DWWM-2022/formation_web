$rgpdBar = document.getElementById('gdpr-module');
$rgpdBtnFooter = document.getElementById('rgpd-footer');
forceUpdateLeft = new Date(2020, 10 - 1, 13);
window.addEventListener('load', () => {
    $rgpdBtnFooter.addEventListener('click', (e) => {
        $rgpdBar.style.display = 'block';
        document.body.style.overflow = 'hidden';
    });
    cleanGdpr();
    if (localStorage.getItem('analytics_gdpr_accept') === null) {
        $rgpdBar.style.display = 'block';
        document.body.style.overflow = 'hidden';
    }
    if (localStorage.getItem('analytics_gdpr_accept') === 'yes') {
        $rgpdBar.querySelectorAll('#analytics-checkbox input').checked = true;
        /*loadAnalytics();*/
    }
});
$rgpdBar.querySelectorAll('#accept-btn').forEach(box => {
    box.addEventListener('click', (e) => {
        localStorage.setItem('analytics_gdpr_accept', 'yes');
        $rgpdBar.querySelectorAll('#analytics-checkbox input').checked = true;
        /*loadAnalytics();*/
        $rgpdBar.style.display = 'none';
        document.body.style.overflow = 'unset';
    });
});
$rgpdBar.querySelectorAll('#refuse-btn').forEach(box => {
    box.addEventListener('click', (e) => {
        $rgpdBar.querySelectorAll('#analytics-checkbox input').checked = false;
        localStorage.setItem('analytics_gdpr_accept', 'no');
        $rgpdBar.style.display = 'none';
        document.body.style.overflow = 'unset';
    });
});
$rgpdBar.querySelectorAll('#config-button').forEach(box => {
    box.addEventListener('click', (e) => {
        $rgpdBar.querySelectorAll('.trackers-choices')
        .forEach(box => {
            box.style.display = 'block';
        });
    });
});
$rgpdBar.querySelectorAll('#analytics-checkbox input').forEach(box => {
    box.addEventListener('click', (e) => {
        if ($rgpdBar.querySelectorAll('#analytics-checkbox input').checked) {
            localStorage.setItem('analytics_gdpr_accept', 'yes');
        } else {
            localStorage.removeItem('analytics_gdpr_accept');
        }
    });
});
$rgpdBar.querySelectorAll('#refuse-gdpr').forEach(box => {
    box.addEventListener('click', (e) => {
        if (localStorage.getItem('analytics_gdpr_accept') !== 'yes') {
            localStorage.setItem('analytics_gdpr_accept', 'no');
        }
        $rgpdBar.style.display = 'none';
        document.body.style.overflow = 'unset';
    });
});

/*
function loadAnalytics() {
    const script = document.createElement('script');
    script.src = 'https://www.googletagmanager.com/gtag/js?id=UA-190496691-1';
    script.addEventListener('load', () => {
        window.dataLayer = window.dataLayer || [];

        function gtag(...args) {
            window.dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'UA-190496691-1');
    });
    document.querySelector('body').appendChild(script);
}
*/

function cleanGdpr() {
    if (localStorage.getItem('last_force_update') === undefined) {
        removeAllItem();
        localStorage.setItem('last_force_update', forceUpdateLeft.toDateString());
    } else if (forceUpdateLeft > new Date(localStorage.getItem('last_force_update'))) {
        removeAllItem();
        localStorage.setItem('last_force_update', forceUpdateLeft.toDateString());
    }
}

function removeAllItem() {
    localStorage.removeItem('analytics_gdpr_accept');
}