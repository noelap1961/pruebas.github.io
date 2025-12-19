// search index for WYSIWYG Web Builder
var database_length = 0;

function SearchPage(url, title, keywords, description)
{
   this.url = url;
   this.title = title;
   this.keywords = keywords;
   this.description = description;
   return this;
}

function SearchDatabase()
{
   database_length = 0;
   this[database_length++] = new SearchPage("index.html", "Equipos Electrodomésticos", "Equipos más vendidos  Ollas Reinas  Ollas Arroceras  Ollas de Presión   Contactos  Dirección  Calle 33 # 5615, e/ 54 y 56 Cienfuegos, Cuba  Teléfonos  Horario  Lunes a Viernes  8 00am - 4 00pm Sábados              8 00am - 1 00pm  +53-53166421 +53-55193327   ", "");
   this[database_length++] = new SearchPage("energia.html", "Útiles de Energía", "Equipos más vendidos  Ollas Reinas  Ollas Arroceras  Ollas de Presión   Contactos  Dirección  Calle 33 # 5615, e/ 54 y 56 Cienfuegos, Cuba  Teléfonos  Horario  Lunes a Viernes  8 00am - 4 00pm Sábados              8 00am - 1 00pm  +53-53166421 +53-55193327  Generadores  $ 800.00  $ 2400.00  Generador de energía Delta 2 de 1800W con pico de 2700W Marca EcoFlow  $ 1400.00  Generador de energía Delta 2 de 2400W con pico de 3600W y 2048W/h Marca EcoFlow  Generador de energía Delta Pro de 3600W con pico de 7200W y 3600W/h Marca EcoFlow  $ 700.00  Planta eléctrica, tecnología Inverter Pico 2300W Potencia 1800W-110V...Marca Pulsar  Convertidores  $ 800.00  $ 160.00  Covertidor y bateria 72v, 35A con su cargador  $ 160.00  Convertidor 3000W 72A Marca Unizuki  Convertidor 3000W 12v  $ 700.00  Planta eléctrica, tecnología Inverter Pico 2300W Potencia 1800W-110V...Marca Pulsar  Baterias  $ 330.00  $ 160.00  Batería LifeP04 100A 12v  $ 650.00  Batería de Litio 72v, 35A  Convertidor 3000W 12v  $ 700.00  Planta eléctrica, tecnología Inverter Pico 2300W Potencia 1800W-110V...Marca Pulsar  Cables  $ 100.00  $ 160.00  Cable solar 50m, 6mm  $ 50.00  Manguera eléctrica 100m  Convertidor 3000W 12v  $ 700.00  Planta eléctrica, tecnología Inverter Pico 2300W Potencia 1800W-110V...Marca Pulsar  Calentadores  $ 200.00  $ 250.00  Calentador de agua central, 30Lts  $ 220.00  $ 270.00  Calentador de agua central, 50Lts  Calentador de agua central, 80Lts  Calentador de agua central, 100Lts  Cargadores  $ 120.00  $ 250.00  Controlador de carga solar 48v-60-72v  $ 50.00  $ 270.00  Cargador de bateria de carro  Calentador de agua central, 80Lts  Calentador de agua central, 100Lts  Equipos Varios  $ 30.00  $ 40.00  Lámpara recargable con panel solar  $ 70.00  $ 50.00  Transfer automático 63A 110v  Turbina 1/2HP Hmax  36m Marca  MasterSonic  Turbina 1HP Hmax  45m Marca  MasterSonic   ", "");
   this[database_length++] = new SearchPage("formulario.php", "Equipos Electrodomésticos", "Formulario para encargar equipos    ", "");
   this[database_length++] = new SearchPage("gracias.html", "Untitled Page", "Gracias por usar nuestros servicios  Su encargo ha sido enviado satisfactoriamente Contactaremos con usted lo antes posible.  Dirección  Calle 33 # 5615, e/ 54 y 56 Cienfuegos, Cuba  Teléfonos  Horario  Lunes a Viernes  8 00am - 4 00pm Sábados              8 00am - 1 00pm  +53-53166421 +53-55193327   ", "");
   this[database_length++] = new SearchPage("error.html", "Untitled Page", " Ha ocurrido un ERROR   Su encargo no ha podido ser enviado Contacte con nosotros lo antes posible  Dirección  Calle 33 # 5615, e/ 54 y 56 Cienfuegos, Cuba  Teléfonos  Horario  Lunes a Viernes  8 00am - 4 00pm Sábados              8 00am - 1 00pm  +53-53166421 +53-55193327   ", "");
   return this;
}
