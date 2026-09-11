/* Guru Expert Power Tools - UI behaviours (sticky header, mobile menu, cart drawer, shop filters, back-to-top). ES2024, no deps. */
(() => {
  'use strict';
  const on = (el, ev, fn, o) => el && el.addEventListener(ev, fn, o);
  const $ = (s, c = document) => c.querySelector(s);
  const $$ = (s, c = document) => Array.from(c.querySelectorAll(s));

  /* Sticky header */
  const header = $('.rk-header');
  if (header) {
    const mid = $('.rk-header__mid', header);
    const trigger = mid ? mid.offsetTop + mid.offsetHeight : 200;
    const onScroll = () => header.classList.toggle('is-stuck', window.scrollY > trigger);
    on(window, 'scroll', onScroll, { passive: true });
    onScroll();
  }

  /* Mobile hamburger -> product category panel */
  const navToggle = $('.rk-nav-toggle');
  const mobile = $('.rk-mobile');
  const mobileOverlay = $('.rk-mobile__overlay');
  const closeMobile = () => {
    if (!mobile) return;
    mobile.classList.remove('is-open');
    if (mobileOverlay) mobileOverlay.classList.remove('is-open');
    if (navToggle) navToggle.setAttribute('aria-expanded', 'false');
    document.body.classList.remove('rk-noscroll');
  };
  if (navToggle && mobile) {
    on(navToggle, 'click', () => {
      const open = mobile.classList.toggle('is-open');
      if (mobileOverlay) mobileOverlay.classList.toggle('is-open', open);
      navToggle.setAttribute('aria-expanded', open ? 'true' : 'false');
      document.body.classList.toggle('rk-noscroll', open);
    });
    $$('[data-rk-mob-close]').forEach((el) => on(el, 'click', closeMobile));
    mobile.querySelectorAll('a').forEach((a) => on(a, 'click', closeMobile));
    on(document, 'keydown', (e) => { if (e.key === 'Escape') closeMobile(); });
  }

  /* Sticky add-to-cart bar on product pages */
  const stickyBar = $('.rk-sticky-atc');
  const cartForm = $('form.cart') || $('.single_add_to_cart_button');
  if (stickyBar && cartForm) {
    const io = new IntersectionObserver((entries) => {
      entries.forEach((e) => {
        // Show the bar once the main add-to-cart has scrolled out of view.
        const show = !e.isIntersecting && e.boundingClientRect.top < 0;
        stickyBar.classList.toggle('is-visible', show);
        document.body.classList.toggle('rk-sticky-on', show);
      });
    }, { threshold: 0 });
    io.observe(cartForm);
    const jump = $('.rk-sticky-atc__jump', stickyBar);
    if (jump) on(jump, 'click', (ev) => { ev.preventDefault(); cartForm.scrollIntoView({ behavior: 'smooth', block: 'center' }); });
  }

  /* Shop filters slide-in drawer (mobile) */
  const filters = $('.rk-filters');
  const filtersOverlay = $('.rk-filters__overlay');
  const setFilterExpanded = (v) => $$('[data-rk-filters-open]').forEach((b) => b.setAttribute('aria-expanded', v));
  const openFilters = () => {
    if (!filters) return;
    filters.classList.add('is-open');
    if (filtersOverlay) filtersOverlay.classList.add('is-open');
    document.body.classList.add('rk-noscroll');
    setFilterExpanded('true');
  };
  const closeFilters = () => {
    if (!filters) return;
    filters.classList.remove('is-open');
    if (filtersOverlay) filtersOverlay.classList.remove('is-open');
    document.body.classList.remove('rk-noscroll');
    setFilterExpanded('false');
  };
  if (filters) {
    $$('[data-rk-filters-open]').forEach((el) => on(el, 'click', openFilters));
    $$('[data-rk-filters-close]').forEach((el) => on(el, 'click', closeFilters));
    on(document, 'keydown', (e) => { if (e.key === 'Escape') closeFilters(); });
  }

  /* Back to top */
  const top = $('.rk-backtop');
  if (top) {
    on(window, 'scroll', () => top.classList.toggle('is-visible', window.scrollY > 600), { passive: true });
    on(top, 'click', () => window.scrollTo({ top: 0, behavior: 'smooth' }));
  }
})();
