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

## Component Structure

## Instance Structure
