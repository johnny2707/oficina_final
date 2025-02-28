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

    let mechanicOptions = [];
    let vehicleOptions = [];

    let selectMechanic = new TomSelect('#selectMechanic', {
        options: [],
        maxItems: 1, 
        dropdownClass: 'dropdown-menu ts-dropdown',
        optionClass: 'dropdown-item',
        dropdownParent: 'body',
        onInitialize: () => {
            $.ajax({
                type: "get",
                url: `${baseURL}mechanics/getAllMechanics`,
                success: function (data) {
                    if (data.length === 0) {
                        mechanicOptions.push({value: 0, text: "no items found"})
                    } 
                    else {
                        data.forEach(element => {
        
                            var newItem = {value: element.mechanic_id, text: element.mechanic_name}
                            mechanicOptions.push(newItem);
                        });

                        console.log(mechanicOptions)
                        selectMechanic.addOptions(mechanicOptions)
                        selectMechanic.sync();
                    }
                },
                error: function(xhr, status, error) {
                    console.log(xhr);
                    console.log(status);
                    console.log(error);
                }
            });
        }
    });

    let selectVehicleSelect = document.getElementById('selectVehicle');

    let selectVehicle = new TomSelect(selectVehicleSelect, {
        options: [],
        maxItems: 1, 
        dropdownClass: 'dropdown-menu ts-dropdown',
        optionClass: 'dropdown-item',
        dropdownParent: 'body',
        onInitialize: () => {
            $.ajax({
                type: "get",
                url: `${baseURL}vehicles/getAllVehicles`,
                success: function (data) {
                    if (data.length === 0) {
                        vehicleOptions.push({value: 0, text: "no items found"})
                    } 
                    else {
                        data.forEach(element => {
        
                            var newItem = {value: element.vehicle_license_plate, text: element.vehicle_license_plate}
                            vehicleOptions.push(newItem);
                        });

                        console.log(vehicleOptions)
                        selectVehicle.addOptions(vehicleOptions)
                        selectVehicle.sync();
                    }
                },
                error: function(xhr, status, error) {
                    console.log(xhr);
                    console.log(status);
                    console.log(error);
                }
            });
        }
    });
});