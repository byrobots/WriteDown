<template>
  <div class="form-row">
    <label :for="identifier">{{ label }}</label>
    <textarea 
      :id="identifier" 
      :name="identifier" 
      class="wysiwyg-field"/>
  </div>
</template>

<script src="./component.js"></script>
