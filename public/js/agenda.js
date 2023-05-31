document.addEventListener('DOMContentLoaded', function() {
    let formulario = document.querySelector('#FormularioEventos');

    var calendarEl = document.getElementById('agenda');

    var calendar = new FullCalendar.Calendar(calendarEl, {
      initialView: 'dayGridMonth',
      
      locale:"es",
      displayEventTime:false,
      headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,listWeek'
        },

        events: "/agenda/show",

        dateClick:function(info){
            
            formulario.reset();

            formulario.start.value=info.dateStr;
            formulario.end.value=info.dateStr;

            $("#evento").modal("show");

        },

        eventClick:function (info){
            var evento = info.event;
            console.log(evento);  
            
            $.ajax({
                url: '/agenda/editar/' + info.event.id,
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('input[name="_token"]').val()
                },
                success: function(data) {
                    formulario.id.value = data.id;
                    formulario.title.value = data.title;
                    
                    formulario.descripcion.value = data.descripcion;
            
                    formulario.start.value = data.start;
                    formulario.end.value = data.end;

                    $("#evento").modal("show");
                }
            });
            
        }
    });

    calendar.render();

    document.getElementById('btnGuardar').addEventListener("click",function(){
        $.ajax({
            url: '/agenda',
            method: 'POST',
            data: $(formulario).serialize(), // Utiliza serialize() directamente
            success: function() {
                calendar.refetchEvents();
                $("#evento").modal("hide");
            }
        });
    });

    document.getElementById('btnEliminar').addEventListener("click",function(){
        $.ajax({
            url: '/agenda/'+ formulario.id.value,
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': $('input[name="_token"]').val()
            },
            success: function() {
                calendar.refetchEvents();
                $("#evento").modal("hide");
            }
        });
    });

    document.getElementById('btnModificar').addEventListener("click",function(){
        $.ajax({
            url: '/agenda/'+ formulario.id.value,
            method: 'PUT',
            data: $(formulario).serialize(),
            success: function() {
                calendar.refetchEvents();
                $("#evento").modal("hide");
            }
        });
    });
});
