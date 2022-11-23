document.addEventListener('livewire:load', guestCalendar);
Livewire.on('reset-calendar', createGuestCalendar);

let guest_calendar;

function guestCalendar() {
    document.addEventListener('DOMContentLoaded', createGuestCalendar);
}

function createGuestCalendar() {
    var calendarEl1 = document.getElementById('guest-calendar');
    guest_calendar = new FullCalendar.Calendar(calendarEl1, {
        aspectRatio: 0.6,
        initialView: 'dayGridMonth',
        headerToolbar: {
            left: 'prev,next,today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,listWeek',
        },
        locale: 'es',
        events: '/events',
        dateClick: function (info) { Livewire.emitTo('events.guest-calendar', 'openModal', info) },
        eventClick: function (info) { Livewire.emitTo('events.guest-calendar', 'setInfo', info.event) },
    });
    guest_calendar.render();
}