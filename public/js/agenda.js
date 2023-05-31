document.addEventListener("DOMContentLoaded", function () {
    let formulario = document.querySelector("#formularioEventos");

    var calendarEl = document.getElementById("agenda");

    var calendar = new FullCalendar.Calendar(calendarEl, {
        //initialView: 'timeGridWeek',
        initialView: "dayGridMonth",
        locale: "esLocale",
        themeSystem: "bootstrap5",
        height: 900,
        editable: true,
        displayEventTime: false,
        selectable: true,

        headerToolbar: {
            left: "prev,next today",
            center: "title",
            right: "dayGridMonth,timeGridWeek,listWeek",
        },

        events: "/agenda/show",

        eventDragStart: function(info) {
            window.draggedEvent = info.event;
          },
          eventDrop: function(info) {
            var draggedEvent = window.draggedEvent;
            if (draggedEvent) {

              var title = info.event.title;
              var descripcion = info.event.extendedProps.descripcion;
              var newStart = moment(info.event.start).format('YYYY-MM-DD HH:mm:ss');
              var newEnd = moment(info.event.end).format('YYYY-MM-DD HH:mm:ss');
        
              $.ajax({
                url:"/agenda/" + draggedEvent.id, 
                method: 'PUT',
                headers: {
                    "X-CSRF-TOKEN": $('input[name="_token"]').val(),
                },
                data: {
                  id: draggedEvent.id,
                  title: title,
                  descripcion: descripcion,
                  start: newStart,
                  end: newEnd,
                },
                success: function(response) {
                  console.log('Evento actualizado en la base de datos');
                },
                error: function() {
                  console.error('Error al actualizar el evento en la base de datos');
                }
              });
              window.draggedEvent = null;
            }
        },

        dateClick: function (info) {
            formulario.reset();

            // Pasamos la fecha al formato tradicional DateTime
            var startDate = moment(info.start);
            // Misma fecha pero con 2 horas más
            var endDate = moment(startDate).add(2, "hours");

            $('#btnGuardar').show();
            $('#btnModificar').hide();
            $('#btnEliminar').hide();

            formulario.start.value = startDate.format("YYYY-MM-DD HH:mm:ss");
            formulario.end.value = endDate.format("YYYY-MM-DD HH:mm:ss");
            $("#evento").modal("show");
        },

        eventClick: function (info) {
            $('#btnModificar').show();
            $('#btnEliminar').show();
            $('#btnGuardar').hide();
            $.ajax({
                url: "/agenda/editar/" + info.event.id,
                method: "POST",
                headers: {
                    "X-CSRF-TOKEN": $('input[name="_token"]').val(),
                },
                success: function (data) {
                    formulario.id.value = data.id;
                    formulario.title.value = data.title;

                    formulario.descripcion.value = data.descripcion;

                    formulario.start.value = data.start;
                    formulario.end.value = data.end;

                    $("#evento").modal("show");
                },
            });
        },
    });
    calendar.render();

    document
        .getElementById("btnGuardar")
        .addEventListener("click", function () {
            $.ajax({
                url: "/agenda",
                method: "POST",
                data: $(formulario).serialize(), // Utiliza serialize() directamente
                success: function () {
                    calendar.refetchEvents();
                    $("#evento").modal("hide");
                },
            });
        });

    document
        .getElementById("btnEliminar")
        .addEventListener("click", function () {
            $.ajax({
                url: "/agenda/" + formulario.id.value,
                method: "DELETE",
                headers: {
                    "X-CSRF-TOKEN": $('input[name="_token"]').val(),
                },
                success: function () {
                    calendar.refetchEvents();
                    $("#evento").modal("hide");
                },
            });
        });

    document
        .getElementById("btnModificar")
        .addEventListener("click", function () {
            $.ajax({
                url: "/agenda/" + formulario.id.value,
                method: "PUT",
                data: $(formulario).serialize(),
                success: function () {
                    calendar.refetchEvents();
                    $("#evento").modal("hide");
                },
            });
        });
});
