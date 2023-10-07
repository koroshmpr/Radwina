import $ from "jquery";

class Search {
    // 1. describe and create/initiate our object
    constructor() {
        // this.addSearchHTML();

        this.openButton = $("input[type=search]");
        this.closeButton = $(".search-overlay__close, .mobile-overlay__close , body");
        this.searchOverlay = $(".search-overlay");
        this.searchField = $("input[type=search]:visible");
        this.resultsDiv = $(".search-overlay__results");
        this.events();

        this.isOverlayOpen = false;
        this.isSpinnerVisible = false;

        this.previousValue;
        this.typingTimer;
    }

    // 2.events
    events() {
        this.openButton.on("click", this.openOverlay.bind(this));
        this.closeButton.on("click", this.closeOverlay.bind(this));
        $(document).on("keydown", this.keyPressDispatcher.bind(this));

        this.searchField.on("keyup", this.typingLogic.bind(this));
    }


    // 3. methods (function, action...)
    typingLogic() {
        if (this.searchField.val()) {
            $(".mobile-overlay__close").removeClass('d-none');
        }
        if (this.searchField.val() != this.previousValue) {
            clearTimeout(this.typingTimer);
            if (this.searchField.val()) {
                if (!this.isSpinnerVisible) {
                    this.resultsDiv.html(`<div class="text-center my-5"><div class="spinner-border align-baseline text-warning" role="status"></div></div>`);
                    this.isSpinnerVisible = true;

                }
                this.typingTimer = setTimeout(this.getResults.bind(this), 750);
            } else {
                this.resultsDiv.html('');
                this.isSpinnerVisible = false;
            }
        }
        this.previousValue = this.searchField.val();
    }

    getResults() {
        $.getJSON(jsData.root_url + '/wp-json/search/v1/search?term=' + this.searchField.val(), (results) => {
            console.log(results)
            this.resultsDiv.html(`
                <div class="pt-3">
                    <div class="row g-3">
                        <!--       PRODUCT      -->
                        <div class="col-12">
                        <h5 class="pt-3 text-center text-white fs-2">جسبجو در محصولات</h5>
                        ${results.product.length ? '<div class="row row-cols-lg-6 row-cols-1 py-4">' : '<p class="p-2' +
                ' m-0' +
                ' border-top">هیچ محصولی یافت' +
                ' نشد</p>'}
                        ${results.product.map(item =>
                `<a class="my-2 animate__animated animate__slideInUp" href="${item.url}" alt="${item.title}">
                                <div class="p-0 bg-warning bg-opacity-75 text-center rounded-2 shadow">
                                          <img src="${item.img}" class="rounded-top w-100" width="200" height="200"  alt="${item.title}">
                                           <h6 class="text-dark fs-6 fw-bold p-3">${item.title}</h6>
                                </div>
                            </a>`
            ).join('')}
                        ${results.product.length ? '</div>' : ''}
                        </div>
                    </div>
                </div>
            `)
            this.isSpinnerVisible = false;
        });
    }

    keyPressDispatcher(e) {
        if (e.keyCode == 83 && !this.isOverlayOpen && !$("input, textarea").is(':focus')) {
            this.openOverlay();
        }
        if (e.keyCode == 27 && this.isOverlayOpen) {
            this.closeOverlay();
        }
    }

    openOverlay() {
        this.searchOverlay.addClass("search-overlay--active");
        $("body").addClass("body-no-scroll");

        this.searchField.val('');

        setTimeout(() => this.searchField.focus(), 301);

        this.isOverlayOpen = true;
        return false;

    }

    closeOverlay() {
        this.searchOverlay.removeClass("search-overlay--active");
        $("body").removeClass("body-no-scroll");
        this.resultsDiv.html('');
        $(".mobile-overlay__close").addClass('d-none');
        this.searchField.val('');
        this.isOverlayOpen = false;
    }

}

export default Search;