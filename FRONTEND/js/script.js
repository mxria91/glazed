// Smooth Scroll
window.addEventListener('DOMContentLoaded', function() {
  const scrollBtn = document.querySelector('.scroll-down');
  
  scrollBtn.addEventListener('click', function(event) {
    event.preventDefault();
    const section = document.querySelector(scrollBtn.getAttribute('href'));
    section.scrollIntoView({behavior: 'smooth', block: 'start'});
  });
});


// Slides
window.onload = function () {
  const slides = document.querySelector('.slides');
  const slideImages = slides.querySelectorAll('img');
  const pagination = document.querySelector('.pagination');

  const paginationDots = 3;
  const numPaginationDots = Math.min(slideImages.length, paginationDots);

  for (let i = 0; i < numPaginationDots; i++) {
    const dot = document.createElement('span');
    dot.classList.add('dot');
    if (i === 0) {
      dot.classList.add('active');
    }
    pagination.appendChild(dot);
  }

  const dots = pagination.querySelectorAll('.dot');

  let slideIndex = 0;

  function showSlide(index) {
    slides.style.transform = `translateX(-${index * 50}%)`;
    dots.forEach(dot => dot.classList.remove('active'));
    dots[index].classList.add('active');

    // Update slideImages variable with the latest images
    slideImages = slides.querySelectorAll('img');
  }

  function nextSlide() {
    slideIndex++;
    if (slideIndex >= slideImages.length) {
      slideIndex = 0;
      clearInterval(slideInterval);
    }
    showSlide(slideIndex);
  }

 

  function prevSlide() {
    slideIndex--;
    if (slideIndex < 0) {
      slideIndex = slideImages.length - 1;
    }
    showSlide(slideIndex);
  }

 
  
  dots.forEach((dot, index) => {
    dot.addEventListener('click', () => {
      slideIndex = index;
      showSlide(slideIndex);
    });
  });


  const slideInterval = setInterval(nextSlide, 2000); // Change slide every 2 seconds
};


  /*
  ----------
  Smooth Scroll 
  ----------
  1. Fenster muss vollständig geladen sein, bevor er ausgeführt wird (DOMContentLoaded)
  2. Die Variable scrollBtn wird definiert und das Element mit der Klasse "scroll-down" wird mithilfe von document.querySelector() abgefragt
  3. Event-Listener wird auf das "click"-Ereignis des "Scroll Down" Buttons hinzugefügt
  4. Der Standardaktion des Klickereignisses wird verhindert, d.h. das Klicken auf den Button führt nicht dazu, dass die Seite scrollt oder zu einem anderen Link navigiert
  5. const section ... Die Variable section wird definiert und das Element, auf das der Button verweist, wird mithilfe von scrollBtn.getAttribute('href') abgefragt.
  6.  section.scrollIntoView({behavior: 'smooth', block: 'start'}); - Die scrollIntoView()-Methode wird auf dem Element ausgeführt, auf das der Button verweist. Diese Methode scrollt die Seite so, dass das Element vollständig sichtbar ist. Die Option behavior: 'smooth' sorgt dafür, dass das Scrollen sanft und animiert ist, während block: 'start' dafür sorgt, dass das Element am Anfang des Bildschirms ausgerichtet wird.
  */


  /*
  ----------
  Slider - Menu
  ----------
  1. Code wird nur dann ausgeführt, sobald content geladen ist
  2. Element mit class .slides wird gesucht und in Variable slides gespeichert
  3. Element mit img wird gesucht und gespeichert in Variable slideImages 
  4. Element mit class .pagination wird gesucht und in Variable pagination gespeichert
  */


  /*
  ----------
  Dots für Pagination
  ----------
  1. Const dot --> Definition wieviele Punkte angezeigt werden sollen für die Navigation
  2. Const numPaginationDots --> Berechnung der tatsächlich angezeigten Punkte (minimum Anzahl Bilder in DiaShow und Anzahl Punkte die angezeigt werden sollen)
  3. for-Schleife für numPaginationDots
  4. Erstellt ein neues <span>
  5. fügt die CSS-Klasse dot zum <span> Element
  6. fügt der ersterstellten Dot ein active Class hinzu
  7. pagination.appendChild(dot) fügt <span> Element als Kind des Elements hinzu, welcher durch Variable pagination referenziert wird.
  8. const dots = pagination --> sucht nach allen <span> Elementen dass im vorherigen Schritt gefunden wurde und speichert Sie in dots Variable
  9. slideIndex = beginnt bei 0
  10. showSlide Funktion --> zeigt Bild in DiaShow basierend auf übergebenen Index
  11. slides.style.transform = translateX(-${index * 50}%); setzt das CSS-Transformationsattribut des Elements, das durch die Variable slides referenziert wird, um die Diashow um die Breite eines einzelnen Bildes zu verschieben
  12. dots.forEach(dot => dot.classList.remove('active')); entfernt die "active"-CSS-Klasse von allen Punkten in der Navigationsleiste
  13. dots[index].classList.add('active'); fügt der aktuellen Punkt in der Navigationsleiste die "active"-CSS-Klasse hinzu
  14. slideImages = slides.querySelectorAll('img'); aktualisiert die Variable slideImages mit einer Liste der aktuellen Bilder in der Diashow
  15. function nextSlide() --> das nächste Bild anzeigen
  16. slideIndex++; erhöht den Index des aktuellen Bildes um 1
  17. if (slideIndex >= slideImages.length) {slideIndex = 0; clearInterval(slideInterval);} prüft, ob der Index des aktuellen Bildes größer oder gleich der Anzahl der Bilder in der Diashow ist. Wenn dies der Fall ist, setzt es den Index auf 0 zurück und stoppt den automatischen Wechsel der Bilder.
  */ 

   /*
  ----------
  nextSlide
  ----------

  1. Increment von slideIndex
  2. Prüfung, ob größer oder gleich der Nummer von slideImages
  3. Wenn ja, reset auf 0 und Intervall resetten
  4. Aufruf von Funktion showSlide um nächstes Slide anzuzeigen
  */


  /*
  ----------
  prevSlide
  ----------

  1. Gleiche Funktion wie nextSlide, nur wird hier Decrement verwentdet für slide Index
  
  */

  
  /*
  ----------
  dots.forEach
  ----------

  1. Klick Eventlistener wird für jeden Punkt (dot) eingefügt.
  2. Wann auf ein Punkt geklickt wird, wird die slideIndex Variable auf die Index vom geklickten Punkt gesetzt
  3. die showSlide Funktion wird gerufen

  */

  /*
  ---------------
  slideInterval
  ---------------

  1. slideInterval-Konstante wird erstellt, um ein Intervall zu starten, das alle 5 Sekunden die nextSlide()-Funktion aufruft und somit die automatische Slideshow ermöglicht.
  */



