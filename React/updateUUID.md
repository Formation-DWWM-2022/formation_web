# Update UUID

Dans la vidéo suivante, j'ai utilisé le package UUID version 3 pour me générer des id.

J'ai donc importé le uuid comme ceci:  import uuid from 'uuid'

Update: uuid version 4

En lançant npm install uuid, vous aurez la version 4. (Recommandée!)

Avec cette version 4, vous devez faire le import avec les "named exports" comme ceci:

import { v4 as uuidv4 } from 'uuid';

Utilisation inchangée

```js
const addNewTodo = (newTodo) => {
    setTodos([...todos, {
        id: uuidv4(),
        todo: newTodo,
      },
    ])
}
```
