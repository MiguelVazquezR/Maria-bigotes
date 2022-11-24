document.addEventListener('livewire:load', adminCalendar);
Livewire.on('reset-calendar', createAdminCalendar);

let admin_calendar;

function adminCalendar() {
    document.addEventListener('DOMContentLoaded', createAdminCalendar);
}

function createAdminCalendar() {
    var calendarEl2 = document.getElementById('admin-calendar');
    admin_calendar = new FullCalendar.Calendar(calendarEl2, {
        aspectRatio: 0.6,
        initialView: 'listWeek',
        headerToolbar: {
            left: 'prev,next,today',
            center: 'title',
            right: 'listWeek,dayGridMonth,timeGridWeek',
        },
        locale: 'es',
        events: '/events',
        dateClick: function (info) { Livewire.emitTo('events.admin-calendar', 'openModal', info) },
        eventClick: function (info) { Livewire.emitTo('events.admin-calendar', 'setInfo', info.event) },
    });
    admin_calendar.render();
}