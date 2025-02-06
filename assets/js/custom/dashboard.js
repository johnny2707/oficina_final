"use strict";

$(document).ready(function () {
    
    $("#page-loader").hide();

    let calendarEl = document.getElementById('dailySchedule');
    let calendar = new FullCalendar.Calendar(calendarEl, {
        headerToolbar: {
            start: 'title',
            end: 'timeGridDay,listDay'
        },
        footerToolbar: {
            start: 'prev',
            center: 'today',
            end: 'next'
        },
        businessHours: {
            daysOfWeek: [ 1, 2, 3, 4, 5 ],
            startTime: '09:00',
            endTime: '18:30',
        },
        weekends: false,
        allDaySlot: true,
        slotMinTime: '07:00:00',
        themeSystem: 'bootstrap5',
        locale: 'pt',
        initialView: 'timeGridDay',
        eventDidMount: function (info) {
            $(info.el).tooltip({
                title: info.event.extendedProps.description,
                html: true,
                container: 'body'
            });
        },
        datesSet: function (info) {
            let currentYear = info.view.currentStart.getFullYear();
        
            calendar.getEventSources().forEach(function(eventSource) {
                eventSource.remove();
            });

            calendar.addEventSource({
                url: `${baseURL}calendar/events`,
                method: 'POST',
                extraParams: {
                    currentYear
                },
                failure: function(data) {
                    notyf.error("Ocorreu um erro a carregar os eventos no calendário");
                }
            });
        }
    });
    calendar.render();

});