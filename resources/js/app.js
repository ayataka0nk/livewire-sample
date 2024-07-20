import './bootstrap'

const getNavigationModal = () => {
  return document.querySelector('[data-component="navigation-modal"]')
}

const getNavigationModalScrim = () => {
  return document.querySelector('[data-component="navigation-modal-scrim"]')
}


const openNavigationModal = () => {
  const navigation = getNavigationModal()
  const navigationModalScrim = getNavigationModalScrim()
  navigation.classList.remove('-translate-x-full');
  navigationModalScrim.classList.remove('hidden', 'opacity-0');
  navigationModalScrim.classList.add('opacity-40')
}

const closeNavigationModal = () => {
  const navigation = getNavigationModal()
  const navigationModalScrim = getNavigationModalScrim()
  navigation.classList.add('-translate-x-full');
  navigationModalScrim.classList.remove('opacity-40');
  navigationModalScrim.classList.add('opacity-0')
  setTimeout(() => {
    navigationModalScrim.classList.add('hidden');
  }, 200);
}


const navigationCloseButton = document.querySelector('[data-action="navigation-close"]')
navigationCloseButton.addEventListener('click', closeNavigationModal)

const navigationOpenButton = document.querySelector('[data-action="navigation-open"]')
navigationOpenButton.addEventListener('click', openNavigationModal)

const navigationModalScrim = getNavigationModalScrim()
navigationModalScrim.addEventListener('click', closeNavigationModal)