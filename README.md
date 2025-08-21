Principio de Responsabilidad Única - Proyecto SOLID
¡Bienvenido! 🚀

Este proyecto es una aplicación web sencilla para crear, editar y borrar tareas, diseñada y desarrollada aplicando el Principio de Responsabilidad Única (SRP), uno de los cinco principios SOLID para un código limpio, mantenible y escalable.

¿Qué es el Principio de Responsabilidad Única?
El Principio de Responsabilidad Única establece que cada módulo, clase o función debe tener una única responsabilidad o motivo para cambiar.
En esta app, cada componente está pensado para cumplir un solo propósito, facilitando la gestión y evolución del código.

Características de la aplicación
Crear nuevas tareas

Editar tareas existentes

Borrar tareas 

Código modular y organizado respetando SRP

Tecnologías usadas
PHP para la lógica backend

HTML/CSS para la interfaz

Principio 2: Open/Closed (Abierto/Cerrado)

Qué es: El código debe estar abierto a extensiones pero cerrado a modificaciones. Esto significa que puedes agregar nueva funcionalidad sin tocar el código existente.

Cómo se aplica en tu proyecto:

La clase GuardarTarea maneja tareas normales y la clase TareaUrgente extiende su funcionalidad sin modificarla, agregando solo la gestión de la fecha límite.

Así, si mañana quieres agregar otro tipo de tarea especial, solo creas una nueva clase que extienda GuardarTarea sin romper lo que ya funciona.

Principio 3: Liskov Substitution (Sustitución de Liskov)

Qué es: Las subclases deben poder sustituir a sus superclases sin que nada falle. En otras palabras, cualquier instancia de una clase hija debe comportarse como la clase padre.

Cómo se aplica en tu proyecto:

TareaUrgente puede reemplazar a GuardarTarea en cualquier parte del código donde se espere una tarea normal, porque comparte la misma interfaz de save().

Esto garantiza que tu sistema puede manejar distintos tipos de tareas sin cambios en la lógica principal.

Principio 4: Interface Segregation (Segregación de Interfaces)

Qué es: Es mejor tener interfaces pequeñas y específicas que una grande que obligue a implementar cosas innecesarias.

Cómo se aplica en tu proyecto:

Creaste interfaces como EditarTareaInterface que solo define edit().

Esto permite que solo las clases que realmente necesitan editar implementen esta interfaz, sin verse obligadas a tener métodos de eliminar o guardar que no usan.
