
// Получаем элемент шапки
const header = document.querySelector('header');

// Функция, которая будет срабатывать при прокрутке страницы
window.addEventListener('scroll', function() {
    if (window.scrollY > 50) {  // Если страница прокручена более чем на 50 пикселей
        header.classList.add('visible');  // Добавляем класс "visible", чтобы шапка появилась
    } else {
        header.classList.remove('visible');  // Убираем класс "visible", чтобы шапка скрылась
    }
});
