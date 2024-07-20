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


document.querySelectorAll('[data-action="navigation-close"]').forEach((button) => {
  button.addEventListener('click', closeNavigationModal)
})

document.querySelectorAll('[data-action="navigation-open"]').forEach((button) => {
  button.addEventListener('click', openNavigationModal)
})

const navigationModalScrim = getNavigationModalScrim()
navigationModalScrim?.addEventListener('click', closeNavigationModal)
