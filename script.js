jQuery(document).ready(function($) {
    const form = $('#url-form');
    const urlInput = $('#url-input');
    const previewContainer = $('#preview-container');
    const previewIframe = $('#preview-iframe');
    const previewIframeMobile = $('#preview-iframe-mobile');
    const desktopButton = $('#desktop-button');
    const mobileButton = $('#mobile-button');
    const desktopMockup = $('#desktop-mockup');
    const mobileMockup = $('#mobile-mockup');

    form.on('submit', function(e) {
        e.preventDefault();
        let url = urlInput.val().trim();
        if (!url.startsWith('http://') && !url.startsWith('https://')) {
            url = 'https://' + url;
        }
        previewIframe.attr('src', url);
        previewIframeMobile.attr('src', url);
    });

    desktopButton.on('click', function() {
        desktopMockup.show();
        mobileMockup.hide();
        desktopButton.addClass('active');
        mobileButton.removeClass('active');
    });

    mobileButton.on('click', function() {
        desktopMockup.hide();
        mobileMockup.show();
        mobileButton.addClass('active');
        desktopButton.removeClass('active');
    });

    previewIframe.on('load', function() {
        this.style.pointerEvents = 'none';
    });

    previewIframeMobile.on('load', function() {
        this.style.pointerEvents = 'none';
    });
});
