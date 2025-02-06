"use strict";

$(document).ready(function() {

    $('#page-loader').hide();

    let calendarEl = document.getElementById('schedule');
    let calendar = new FullCalendar.Calendar(calendarEl, {
        headerToolbar: {
            start: 'today prev,next',
            center: 'title',
            end: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
        },
        businessHours: {
            daysOfWeek: [ 1, 2, 3, 4, 5 ],
            startTime: '09:00',
            endTime: '18:30',
        },
        contentHeight: 'auto',
        allDaySlot: true,
        slotMinTime: '07:00:00',
        themeSystem: 'bootstrap5',
        locale: 'pt',
        initialView: 'timeGridWeek',
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