document.addEventListener('DOMContentLoaded', function() {
    const seeProlong = document.querySelectorAll('.see-more');
  
    seeProlong.forEach(function(button) {
      button.addEventListener('click', function() {
        const cardBody = button.closest('.card-body');
        const cardText = cardBody.querySelector('.card-text');
        const content = cardText.innerHTML;
  
        if (button.innerHTML === 'Prolonger') {
          button.innerHTML = 'Réduire';
          cardText.innerHTML = content + content.substring(0, 100);
        } else {
          button.innerHTML = 'Prolonger';
          cardText.innerHTML = content.substring(0, content.length - 100);
        }
      });
    });
  });
  