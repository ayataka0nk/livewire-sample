@php

  $styles = ['row-start-1', 'row-end-2', 'col-start-1', 'col-end-2'];

@endphp

<div @class(['row-start-1', 'row-end-2', 'col-start-1', 'col-end-2'])>
  <textarea {{ $attributes->class(['row-start-1', 'row-end-2', 'col-start-1', 'col-end-2']) }}
    onInput="this.parentNode.dataset.replicatedValue = this.value"></textarea>
</div>
<style>
  .grow-wrap>textarea,
  .grow-wrap::after {
    /* Identical styling required!! */
    /* Place on top of each other */
    {{-- grid-area: 1 / 1 / 2 / 2; --}}
  }
</style>
