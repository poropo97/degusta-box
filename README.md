# Time Tracker Task

## Enunciado

### 1. Descripción de la tarea
El objetivo es crear un rastreador de tiempo simple. El usuario debe poder:
- Escribir el nombre de la tarea en la que está trabajando y hacer clic en "start".
- Ver el temporizador que muestra cuánto tiempo lleva trabajando en la tarea.
- Hacer clic en "stop" para dejar de trabajar en esa tarea (el temporizador se detiene).
- Escribir otro nombre para una tarea diferente y hacer clic en "start" nuevamente. La página debe comenzar a contar desde el principio.
- En la misma página (u otra, a tu elección) el usuario debe poder ver un resumen del rastreador de tiempo donde se muestre cuánto tiempo ha pasado en cada tarea y cuánto tiempo ha trabajado hoy.

### 2. Requisitos
- Colocar todo el código en GitHub o Bitbucket.
- Almacenar el proyecto en un contenedor Docker.
- Utilizar tu framework de PHP favorito, aunque preferimos Symfony. Buscamos un profesional que pueda hacer un uso inteligente de las herramientas de desarrollo, siempre teniendo en cuenta los principios SOLID.
- Los datos deben almacenarse en cualquier base de datos relacional que desees.
- Las tareas pueden ser reconocidas por nombre, por lo que si escribo "desarrollo de la página principal" dos veces en un día, pasando 2 horas en la mañana y 0.5 horas en la tarde, al final del día debería ver 2.5 horas junto a "desarrollo de la página principal".
- No olvides el README.md.

### 3. Consejos
No requerimos que la página sea hermosa, puede tener el estilo más simple, pero por favor hazla responsiva, de la manera más simple posible. Recuerda, ¡primero móvil!

### 4. Un paso más allá (opcional)
Nos encanta la terminal, así que agradeceríamos si escribes un script en PHP que reciba por parámetro la acción (start / end) y el nombre de la tarea. Y otro que devuelva una lista de todas las tareas con su estado, hora de inicio, hora de finalización y tiempo total transcurrido.
