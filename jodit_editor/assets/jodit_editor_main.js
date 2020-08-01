
let jodit_ta = 'textarea.jodit-editor';

$(document).on('rex:ready', function (e, container) {
    let editors = $(jodit_ta);
    for(let i = 0; i < editors.length; i++) {
        var randID = 'jodit-' + i;
        $(editors[i]).attr('id', randID);
        let idOfEditor = '#'+randID;
        new Jodit(idOfEditor);
    }
});
