<div data-component="navigation-modal"
  {{ $attributes->class(['fixed top-0 left-0 z-30 w-[360px] h-screen overflow-y-auto bg-surface-container-low shadow-lg -translate-x-full transform transition-transform duration-200 ease-in-out']) }}>
  {{ $slot }}
</div>
<div data-component="navigation-modal-scrim"
  class="fixed inset-0 bg-black transition-opacity duration-200 ease-in-out z-[29] opacity-40 hidden"></div>
