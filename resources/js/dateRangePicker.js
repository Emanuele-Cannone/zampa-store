const dateRangePicker = $('input[name=date-range-picker]');
const startDate = moment(minDate).startOf('day');
const endDate = moment(maxDate).endOf('day');
dateRangePicker.daterangepicker({
    startDate: startDate,
    endDate: endDate,
    opens: 'left',
    autoUpdateInput: false,
    timePicker: false,
    locale: {
        format: dateFormat,
        applyLabel: applyFilter,
        cancelLabel: cancelFilter,
        customRangeLabel: customRange,
        daysOfWeek: weekdaysShort,
        monthNames: months,
        firstDay: 1
    },
    ranges: ranges
});

dateRangePicker.val(startDate.format(dateFormat) + ' - ' + endDate.format(dateFormat));

dateRangePicker.on('apply.daterangepicker', function (ev, picker) {
    $(this).val(picker.startDate.format(dateFormat) + ' - ' + picker.endDate.format(dateFormat));
    if (teamManagement) {
        const newParams = '?start_date=' + picker.startDate.format('YYYY-MM-DD') + '&end_date=' + picker.endDate.format('YYYY-MM-DD');
        if (document.URL.indexOf('?') >= 0) {
            window.location.href = document.URL.replace(document.URL, document.URL.replace(document.URL.substr(document.URL.indexOf('?')), '')) + newParams;
        } else {
            window.location.href = document.URL + newParams;
        }
    } else {
        LaravelDataTables[dataTableId].draw();
    }
});

dateRangePicker.on('cancel.daterangepicker', function (ev, picker) {
    picker.startDate = startDate;
    picker.endDate = endDate;
    $(this).val(startDate.format(dateFormat) + ' - ' + endDate.format(dateFormat));
    if (teamManagement) {
        const newParams = '?start_date=' + startDate.format('YYYY-MM-DD') + '&end_date=' + endDate.format('YYYY-MM-DD');
        if (document.URL.indexOf('?') >= 0) {
            window.location.href = document.URL.replace(document.URL, document.URL.replace(document.URL.substr(document.URL.indexOf('?')), '')) + newParams;
        } else {
            window.location.href = document.URL + newParams;
        }
    } else {
        LaravelDataTables[dataTableId].draw();
    }
});
