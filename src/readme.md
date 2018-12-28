# Frontend Assets
WriteDown's frontend is build as a combination of [Twig](https://twig.symfony.com)
`templates` and [Vue.js](https://vuejs.org) `instances` and `components`. This
document is concerned with the latter.

## Components vs. Instances
Fundamentally, `components` and `instances` are defined differently:

``` js
// A component
Vue.component('error-icon', errorIcon);

// An instance
new Vue({
    el: '#login',
    mixins: [instance],
    render: h => h(login),
});
```

Within WriteDown, an `instance` can be thought of a page, for example the login
page or the new post page. A `component` is part of the page, so the form
itself, or a success icon.

`Instances` pull `components` together but do not provide functionality, which
`components` do. Take the login page as an example - the `login-form` component
makes the requests whereas the `login` instance includes the `components`
required.

A `component` does not *need* to be functional - if it can be re-used across
`instances` then a "dumb component" is fine. If it's only used in one instance
however, and does not provide functionality, consider having it as part of the
`instance` instead.

A `component` that performs a job, such as `login-form`, should be a `component`
regardless of how many times it is used.

## Component Structure
Components reside in the `components` folder, which in turn is organised into
folders named after their respective components.

The `component` is then split into three or four files:

1. `component.js`: Optionally exports the component.
2. `index.js`: Privides the entry point to the component.
4. `template.vue`: The component template.

### `component.js`
When a component starts growing it can make the component file (`template.vue`)
feel cluttered so we define the `export` in it's own separate file and include
it in the `.vue` with:

``` html
<script src="./component.js"></script>
```

### `index.js`
Provides the entry point for the `component` to be used. Adds it to `Vue.js`.

### Styles
Styles should be placed in a `.scss` file in the `src/components` folder. The
file's name should match the components.

``` css
@import '../../sass/organise';
```

### `template.vue`
The component template. On simpler components it may also contain the `export`.

## Instance Structure
