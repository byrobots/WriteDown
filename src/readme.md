# Frontend Assets
WriteDown's frontend is build as a combination of [Twig](https://twig.symfony.com)
templates and [Vue.js](https://vuejs.org) instances and components. This
document is concerned with the latter.

## Components vs. Instances
Fundamentally, components and instances are defined differently.

**Component**
``` js
Vue.component('error-icon', errorIcon);
```

**Instance**
``` js
new Vue({
    el: '#login',
    mixins: [instance],
    render: h => h(login),
});
```
