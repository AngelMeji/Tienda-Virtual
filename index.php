<?php
  require_once 'includes/header.php';
?>
<body class="bg-black text-white font-sans">
  <script>
      tailwind.config = {
          theme: {
          extend: {
              fontFamily: {
              display: ['Helvetica Now Display', 'sans-serif'],
              }
          }
          }
      }
  </script>

  <!-- Hero -->
  <section class="grid grid-cols-3 gap-4 px-6 py-8 items-center">
    <div class="col-span-2">
      <img src="uploads/001.jpg" alt="Autos" class="w-full rounded" />
      <p class="text-sm text-neutral-400 mt-2 font-display">Patriot y Karin Sultan RS</p>
    </div>
    <div class="bg-neutral-900 p-6 rounded flex flex-col justify-between h-full">
      <div>
        <h2 class="text-xl font-bold mb-4 font-display">Ya disponible la nueva colección de autos lujosos</h2>
      </div>
      <div class="mt-auto">
        <button class="border border-white px-6 py-2 hover:bg-white hover:text-black transition">COMPRAR</button>
        <div class="flex space-x-2 mt-4">
          <div class="w-2 h-2 bg-white rounded-full"></div>
          <div class="w-2 h-2 bg-gray-500 rounded-full"></div>
          <div class="w-2 h-2 bg-gray-500 rounded-full"></div>
        </div>
      </div>
    </div>
  </section>

    <!-- Products -->
    <section class="px-6 py-8">
      <h2 class="text-2xl font-bold mb-6">Nuestros Productos</h2>
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- Product card -->
        <div class="bg-neutral-900 p-2 rounded">
          <img src="images/011.jpg" alt="Karin Sultan" class="rounded" />
          <div class="p-4">
            <h3 class="text-sm">Karin Sultan / Sultan RS</h3>
            <p class="font-bold text-lg">$500.000</p>
            <a href="#" class="text-red-400 hover:underline text-sm">Comprar</a>
          </div>
        </div>

        <div class="bg-neutral-900 p-2 rounded">
          <img src="images/013.jpg" alt="Rocket Voltic" class="rounded" />
          <div class="p-4">
            <h3 class="text-sm">Rocket Voltic</h3>
            <p class="font-bold text-lg">$600.000</p>
            <a href="#" class="text-red-400 hover:underline text-sm">Comprar</a>
          </div>
        </div>

        <div class="bg-neutral-900 p-2 rounded">
          <img src="images/006.jpg" alt="Vectre Glendale" class="rounded" />
          <div class="p-4">
            <h3 class="text-sm">Vectre & Benefactor Glendale</h3>
            <p class="font-bold text-lg">$2.500.000</p>
            <a href="#" class="text-red-400 hover:underline text-sm">Comprar</a>
          </div>
        </div>

        <div class="bg-neutral-900 p-2 rounded">
          <img src="images/009.jpg" alt="Patriot" class="rounded" />
          <div class="p-4">
            <h3 class="text-sm">Mammoth Patriot Mil-Spec</h3>
            <p class="font-bold text-lg">$850.000</p>
            <a href="#" class="text-red-400 hover:underline text-sm">Comprar</a>
          </div>
        </div>

        <div class="bg-neutral-900 p-2 rounded">
          <img src="images/005.jpg" alt="Camuflado" class="rounded" />
          <div class="p-4">
            <h3 class="text-sm">Versión camuflada del Patriot Mil-Spec</h3>
            <p class="font-bold text-lg">$1.000.000</p>
            <a href="#" class="text-red-400 hover:underline text-sm">Comprar</a>
          </div>
        </div>

        <div class="bg-neutral-900 p-2 rounded">
          <img src="images/004.jpg" alt="Pegassi Torero" class="rounded" />
          <div class="p-4">
            <h3 class="text-sm">Pegassi Torero XO</h3>
            <p class="font-bold text-lg">$1.600.000</p>
            <a href="#" class="text-red-400 hover:underline text-sm">Comprar</a>
          </div>
        </div>
      </div>
    </section>
  </body>
<?php
require_once 'includes/footer.php';
?>
</html>