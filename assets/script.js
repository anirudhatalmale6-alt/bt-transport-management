// BT Transport Management — front-end interactions.
const toggle = document.querySelector('.nav-toggle');
const nav = document.querySelector('.nav');
toggle?.addEventListener('click', () => {
  const open = nav.classList.toggle('open');
  toggle.setAttribute('aria-expanded', open);
  toggle.textContent = open ? '×' : '☰';
});
document.querySelectorAll('.nav a').forEach(link => link.addEventListener('click', () => {
  nav?.classList.remove('open');
  toggle?.setAttribute('aria-expanded', 'false');
  if (toggle) toggle.textContent = '☰';
}));

// Services flyer pop-up.
const flyerDialog = document.querySelector('#flyer-dialog');
document.querySelector('.flyer-open')?.addEventListener('click', () => flyerDialog?.showModal());
document.querySelector('.flyer-close')?.addEventListener('click', () => flyerDialog?.close());
flyerDialog?.addEventListener('click', event => {
  if (event.target === flyerDialog) flyerDialog.close();
});

// Year fallback (also rendered server-side).
const yearEl = document.querySelector('#year');
if (yearEl && !yearEl.textContent.trim()) yearEl.textContent = new Date().getFullYear();

// After an enquiry submit, make sure the confirmation is in view.
if (window.location.search.indexOf('enquiry=') !== -1) {
  document.querySelector('#contact')?.scrollIntoView();
}
