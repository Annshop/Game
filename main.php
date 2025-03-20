<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GameSub</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <header>  
 

    <img src="free-icon-game-folder-11471667.png" alt="Пример PNG" width="50" height="50">

        <button class="logo">GameSub</button>
        <nav class="cat">
        <button class="menu-btn">≡ Каталог</button>
        </nav>

        
        <div class="search-container">

        <input type="text"  class="search-input" placeholder="Поиск по товарам и категориям">
        
        <button class="search-btn">
        <img src="free-icon-loupe-751463.png" alt="Пример PNG" width="25" height="25">
    </button>
        


         </div>
         <div class="korz">
            <button class="cart"><img src="free-icon-shopping-carts-2168274.png" alt="Иконка" class="icon-img"width="25" height="25"></button>
        </div>

    </header>





</div>
  <div class = "shap">
   <img src="free-icon-game-folder-11471667.png" alt="Пример PNG" width="50" height="50">

        <button class="logo">GameSub</button>
        <nav class="cat">
        <button class="menu-btn">≡ Каталог</button>
        </nav>

        
        <div class="search-container">

        <input type="text"  class="search-input" placeholder="Поиск по товарам и категориям">
        
        <button class="search-btn">
        <img src="free-icon-loupe-751463.png" alt="Пример PNG" width="25" height="25">
    </button>
        


         </div>
         <div class="korz">
            <button class="cart"><img src="free-icon-shopping-carts-2168274.png" alt="Иконка" class="icon-img"width="25" height="25"></button>
        </div>
</div>




    <nav class="categories">
        <a href="#"><img src="free-icon-steam-220789.png" alt="Иконка" class="icon-img"width="30" height="30">Пополнить Steam</a>
    
   
        <a href="#"><img src="free-icon-subscription-5731199.png" alt="Иконка" class="icon-img2"width="35" height="35">Подписки</a>
   
    
        <a href="#"><img src="free-icon-game-console-141309.png" alt="Иконка" class="icon-img"width="30" height="30">Консоли</a>
    
   
        <a href="#"><img src="free-icon-game-10349175.png" alt="Иконка" class="icon-img4"width="35" height="35">Игры</a>
   
   
        <a href="#"><img src="free-icon-game-coin-17933625.png" alt="Иконка" class="icon-img3"width="35" height="35">Игровая валюта</a>
    
        <a href="#"><img src="free-icon-study-program-12029283.png" alt="Иконка" class="icon-img3"width="35" height="35">Программы</a>
  
</nav>

   
<div class="popul">Популярные товары</div>


    <nav class="popular">
       <a href="#"><img src="steam-fotor-20250312233711.png" alt="Иконка" class="popular-img"width="300" height="180"></a>
    
   
        <a href="#"><img src="xbox.jpg" alt="Иконка" class="popular-img"width="300" height="180"></a>
   
    
        <a href="#"><img src="fit_930_519_false_crop_2560_1440_0_0_q90_1039472_8b37b2d0168038629bda665f3.jpeg" alt="Иконка" class="popular-img"width="300" height="180"></a>
    
   
        <a href="#"><img src="fortnite-myths-and-mortals-battle-pass-1920x1080-56228b70b9b3.jpg" alt="Иконка" class="popular-img"width="300" height="180"></a>
   
   
        <a href="#"><img src="valorant.png" alt="Иконка" class="popular-img"width="300" height="180"></a>
    
        <a href="#"><img src="1111-fotor-2025031301343.png" alt="Иконка" class="popular-img"width="300" height="180"></a>
        
    </nav>


    
 <section class="products">
     <a href="#" class="product-card">
    <div class="product">
     <img src="steam-fotor-20250312233711.png" alt="Steam" class="product-image">
    
       <h3 class="product-kateg1">Пополнение</h3>

      <h3 class="product-price">1 Steam RUB = 1.09 ₽</h3>

      <p class="product-description">Автопополнение Steam </p>

      <h3 class="product-kol">Продано: 800</h3>
 
      <button class="buy-btn">Купить</button>

    </div>
    </a>

 </nav>
    


     <script>
        async function fetchProductData() {
    const url = 'https://api.digiseller.com/api/products/list'; // Используем URL API для получения товаров
    const params = {
        ids: '4665118',  // Список ID товаров (пример)
        lang: 'ru-RU', // Язык отображения информации
        token: 'BC36F0341FDF43BCA1392A46F4885EB6' // Замените на свой API token
    };

    // Формируем строку параметров для запроса
    const queryParams = new URLSearchParams(params).toString();

    try {
        // Получаем ответ от API
        const response = await fetch(`${url}?${queryParams}`, {
            method: 'GET',
            headers: {
                'Content-Type': 'application/xml',
                'Accept': 'application/xml'
            }
        });

        // Проверяем успешность запроса
        if (response.ok) {
            const xmlText = await response.text();  // Получаем XML-ответ как текст
            parseXML(xmlText);  // Парсим XML
        } else {
            throw new Error('Ошибка загрузки данных');
        }
    } catch (error) {
        console.error('Ошибка:', error);
    }
}

// Функция для парсинга XML и отображения данных
function parseXML(xmlText) {
    const parser = new DOMParser();
    const xmlDoc = parser.parseFromString(xmlText, "application/xml");

    const products = xmlDoc.querySelectorAll("product");

    // Перебираем все товары и отображаем их
    products.forEach(product => {
        const id = product.querySelector("id").textContent;
        const name = product.querySelector("name").textContent;
        const priceRub = product.querySelector("price_rub").textContent;
        const cntSell = product.querySelector("cnt_sell").textContent;

        displayProduct(id, name, priceRub, cntSell);  // Выводим товар
    });
}

// Функция для отображения товара на странице
function displayProduct(id, name, priceRub, cntSell) {
    const productsContainer = document.querySelector(".products");  // Контейнер для товаров

    const productElement = document.createElement("div");
    productElement.classList.add("product");

    productElement.innerHTML = `
        <div class="product-info">
            <h3>${name}</h3>
            <p>Цена: ${priceRub} ₽</p>
            <p>Продано: ${cntSell} шт.</p>
        </div>
        <button onclick="addToCart(${id})">Купить</button>
    `;

    productsContainer.appendChild(productElement);  // Добавляем товар на страницу
}
    </script>

  

    <!-- Добавьте больше товаров по аналогии -->
  </section>

<script>
// Получаем элемент шапки
const header = document.querySelector('.shap');

// Функция, которая будет срабатывать при прокрутке страницы
window.addEventListener('scroll', function() {
    if (window.scrollY > 380) {  // Если страница прокручена более чем на 50 пикселей
        header.classList.add('visible');  // Добавляем класс "visible", чтобы шапка появилась
    } else {
        header.classList.remove('visible');  // Убираем класс "visible", чтобы шапка скрылась
    }
});
</script>


<script>
    // Получаем все элементы с классом product-description
    const descriptions = document.querySelectorAll('.product-description');

    // Проходим по каждому элементу и ограничиваем его длину
    descriptions.forEach(description => {
        const maxLength = 55;  // Максимальное количество символов

        // Если длина текста больше 50 символов
        if (description.innerText.length > maxLength) {
            description.innerText = description.innerText.slice(0, maxLength) + '';  // Обрезаем и добавляем многоточие
        }
    });
</script>

</body>
</html>