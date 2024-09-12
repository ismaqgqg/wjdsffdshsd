
  // Obtener los elementos del modal
  const modalWrapper = document.querySelector('.registration-modal-wrapper');
  const modalOverlay = document.querySelector('.modal-overlay');
  const showModalButton = document.querySelector('#show-registration-modal');
  
  // Función para mostrar el modal
  const showModal = () => {
      modalWrapper.style.display = 'block';
      modalOverlay.style.display = 'block';
  };
  
  // Función para ocultar el modal
  const hideModal = () => {
      modalWrapper.style.display = 'none';
      modalOverlay.style.display = 'none';
  };
  
  // Abrir el modal al hacer clic en el botón
  if (showModalButton) {
      showModalButton.addEventListener('click', showModal);
  }
  
  // Cerrar el modal al hacer clic en la superposición
  modalOverlay.addEventListener('click', hideModal);
  
  // Manejar el envío del formulario con AJAX
  $('#signup-form').on('submit', function(e) {
      e.preventDefault();
      
      $.ajax({
          type: 'POST',
          url: 'process_form.php',
          data: $(this).serialize(),
          success: function(response) {
              alert('Formulario enviado correctamente');
              document.getElementById('signup-form').reset(); // Opcional: limpiar el formulario
              hideModal(); // Cerrar el modal
          },
          error: function(xhr, status, error) {
              alert('Error al enviar el formulario');
          }
      });
  });
