<div>
    <div class="flex justify-between mt-5">
        <span  class="uppercase">Pide Ahora</span>
        <i class="fa-solid fa-cart-plus text-2xl"></i>
    </div>

    <section class="flex flex-col mt-7 space-y-2">
        <select class="h-[2rem] border border-gray-400 focus:ring rounded-md shadow-md uppercase" name="entradas" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">>
            <option selected disabled value="title">--Las Entradas--</option>
            <option value="https://google.com">--valor1--</option>
            <option value="{{route('selected-product')}}">--valor2--</option>
            <option value="value3">--valor3--</option>
        </select>

        <select class="h-[2rem] border border-gray-400 focus:ring rounded-md shadow-md uppercase" name="ensaladas">
            <option selected disabled value="value1">--Las Ensaladas--</option>
            <option  value="value1">--valor1--</option>
        </select>

        <select class="h-[2rem] border border-gray-400 focus:ring rounded-md shadow-md uppercase" name="tablas">
            <option selected disabled value="value1">--Las Tablas--</option>
            <option  value="value1">--valor1--</option>
        </select>

        <select class="h-[2rem] border border-gray-400 focus:ring rounded-md shadow-md uppercase" name="mas">
            <option selected disabled value="value1">--Algo más--</option>
            <option  value="value1">--valor1--</option>
        </select>
        
        <select class="h-[2rem] border border-gray-400 focus:ring rounded-md shadow-md uppercase" name="pastas">
            <option selected disabled value="value1">--Las Pastas--</option>
            <option  value="value1">--valor1--</option>
        </select>
        
        <select class="h-[2rem] border border-gray-400 focus:ring rounded-md shadow-md uppercase" name="clasicas">
            <option selected disabled value="value1">--Las pizzas Clásicas--</option>
            <option  value="value1">--valor1--</option>
        </select>

        <select class="h-[2rem] border border-gray-400 focus:ring rounded-md shadow-md uppercase" name="gourmet">
            <option selected disabled value="value1">--Las pizzas Gourmet--</option>
            <option  value="value1">--valor1--</option>
        </select>
        
        <select class="h-[2rem] border border-gray-400 focus:ring rounded-md shadow-md uppercase" name="bebidas">
            <option selected disabled value="value1">--Las Bebidas--</option>
            <option  value="value1">--valor1--</option>
        </select>
        
        <select class="h-[2rem] border border-gray-400 focus:ring rounded-md shadow-md uppercase" name="cervezas">
            <option selected disabled value="value1">--Las Cervezas--</option>
            <option  value="value1">--valor1--</option>
        </select>
        
        <select class="h-[2rem] border border-gray-400 focus:ring rounded-md shadow-md uppercase" name="vinos">
            <option selected disabled value="value1">--Los Vinos--</option>
            <option  value="value1">--valor1--</option>
        </select>

    </section>

</div>

