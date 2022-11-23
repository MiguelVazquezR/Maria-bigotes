document.addEventListener('livewire:load', guestCalendar);
Livewire.on('reset-calendar', createGuestCalendar);

let guest_calendar;

function guestCalendar() {
    document.addEventListener('DOMContentLoaded', createGuestCalendar);
}

function createGuestCalendar() {
    var calendarEl1 = document.getElementById('guest-calendar');
    guest_calendar = new FullCalendar.Calendar(calendarEl1, {
        initialView: 'dayGridMonth',
        locale: 'es',
        events: '/events',
        dateClick: function () { Livewire.emitTo('events.guest-calendar', 'openModal') },
    });
    guest_calendar.render();
}