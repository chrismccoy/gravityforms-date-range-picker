jQuery(document).ready(function ($) {
    $('*[id=date]').calentim({
        singleDate: false,
	showButtons: true,
	showTimePickers: true,
	showFooter: false,
	startEmpty: true,
	calendarCount: 3,
	autoCloseOnSelect: true
    });
});
