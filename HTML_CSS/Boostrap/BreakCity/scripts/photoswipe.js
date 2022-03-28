const DEFAULT_OPTIONS = {
    history: false,
    focus: false,
    showAnimationDuration: 0,
    hideAnimationDuration: 0,
};

class Gallery {
    constructor($gallery) {
        this.$gallery = $gallery;
        this.items = [];
        this.$pswp = document.querySelector('.pswp');
        const $items = this.$gallery.querySelectorAll('[data-gallery-item]');
        for (const [index, $item] of $items.entries()) {
            if (!($item instanceof HTMLAnchorElement)) {
                throw new Error('Cannot init gallery, one data-gallery-item is not set on anchor element.');
            }
            const imgInfo = JSON.parse($item.getAttribute('data-gallery-item'));
            this.items.push({
                src: $item.href,
                w: imgInfo[0],
                h: imgInfo[1],
            });
            $item.addEventListener('click', (e) => {
                e.preventDefault();
                this.open(index);
            });
        }
        let opts = {};
        try {
            opts = JSON.parse(this.$gallery.getAttribute('data-gallery'));
        } catch (e) {}
        this.options = Object.assign({}, DEFAULT_OPTIONS, opts);
        const $opener = this.$gallery.querySelector('[data-gallery-opener]');
        if ($opener) {
            $opener.addEventListener('click', () => {
                this.open();
            });
        }
    }
    open(index = 0) {
        const gallery = new PhotoSwipe(this.$pswp, PhotoSwipeUI_Default, this.items, this.options);
        gallery.init();
        gallery.goTo(index);
    }
}
window.addEventListener('load', () => {
    const $galleries = document.querySelectorAll('[data-gallery]');
    for (const $gallery of $galleries) {
        new Gallery($gallery);
    }
})