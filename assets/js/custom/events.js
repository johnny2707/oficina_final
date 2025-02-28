"use strict";

$(document).ready(function() {

    $('#page-loader').hide();

    try {
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
    } catch (error) {
        console.log('Calendar initialization skipped:', error.message);
    }
    

    let mechanicOptions = [];
    let vehicleOptions = [];
    let typeOptions = [];

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
        
                            var newItem = {value: element.employee_id, text: element.employee_name}
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

    let selectVehicle = new TomSelect('#selectVehicle', {
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

    let selectType = new TomSelect('#selectType', {
        options: [],
        maxItems: 1, 
        dropdownClass: 'dropdown-menu ts-dropdown',
        optionClass: 'dropdown-item',
        dropdownParent: 'body',
        onInitialize: () => {
            $.ajax({
                type: "get",
                url: `${baseURL}services/getAllServices`,
                success: function (data) {
                    if (data.length === 0) {
                        typeOptions.push({value: 0, text: "no items found"})
                    } 
                    else {
                        data.forEach(element => {
        
                            var newItem = {value: element.service_id, text: element.service_description}
                            typeOptions.push(newItem);
                        });

                        console.log(typeOptions)
                        selectType.addOptions(typeOptions)
                        selectType.sync();
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

    $(document).on('click', '.createEventButton', function() {

        let event_mechanic_id = $('#selectMechanic').val();
        let event_vehicle_license_plate = $('#selectVehicle').val();
        let event_type = $('#selectType').val();
        let event_date = $('#eventDate').val();
        let event_start = $('#eventStart').val();
        let event_end = $('#eventEnd').val();
        let event_description = $('#eventDescription').val();
        let event_observations = $('#eventObservations').val();

        console.log(event_mechanic_id, event_vehicle_license_plate, event_type, event_date, event_start, event_end, event_description, event_observations);

        $.ajax({
            type: "post",
            url: `${baseURL}calendar/create`,
            data: {
                event_mechanic_id,
                event_vehicle_license_plate,
                event_type,
                event_date,
                event_start,
                event_end,
                event_description,
                event_observations
            },
            success: function (response) {
                if(response.error === true) {
                    notyf.error('Erro ao criar evento.');   
                }
                else {
                    notyf.success('Evento criado com sucesso.');
                    $('#eventDate').val('');
                    $('#eventTime').val('');
                    $('#eventDescription').val('');
                }
            }
        });

    });
});