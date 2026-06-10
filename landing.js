/* ============================================================
   sietesiete — landing.js
   Animations, Nav behaviour, Form validation
============================================================ */
(function () {
  'use strict';

  /* ─── Helpers ──────────────────────────────────────────── */
  const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  function $(sel, ctx) { return (ctx || document).querySelector(sel); }
  function $$(sel, ctx) { return [...(ctx || document).querySelectorAll(sel)]; }

  /* ─── Navbar: scroll + mobile menu ──────────────────────── */
  function initNav() {
    const nav    = $('#ss-nav');
    const burger = $('#ss-burger');
    const menu   = $('#ss-nav-menu');
    if (!nav) return;

    /* Scroll shadow */
    const onScroll = () => {
      nav.classList.toggle('is-scrolled', window.scrollY > 40);
    };
    window.addEventListener('scroll', onScroll, { passive: true });
    onScroll();

    /* Mobile burger */
    if (burger && menu) {
      burger.addEventListener('click', () => {
        const isOpen = burger.getAttribute('aria-expanded') === 'true';
        burger.setAttribute('aria-expanded', String(!isOpen));
        menu.classList.toggle('is-open', !isOpen);
      });

      /* Close on link click */
      $$('a', menu).forEach(link => {
        link.addEventListener('click', () => {
          burger.setAttribute('aria-expanded', 'false');
          menu.classList.remove('is-open');
        });
      });

      /* Close on Escape */
      document.addEventListener('keydown', e => {
        if (e.key === 'Escape' && menu.classList.contains('is-open')) {
          burger.setAttribute('aria-expanded', 'false');
          menu.classList.remove('is-open');
          burger.focus();
        }
      });
    }

    /* Active link on scroll */
    const sections  = $$('[id]').filter(el => el.tagName !== 'BODY');
    const navLinks  = $$('.ss-nav__links a');
    if (navLinks.length && !prefersReducedMotion) {
      const observer = new IntersectionObserver(entries => {
        entries.forEach(entry => {
          if (entry.isIntersecting) {
            navLinks.forEach(l => l.classList.remove('is-active'));
            const match = navLinks.find(l => l.getAttribute('href') === '#' + entry.target.id);
            if (match) match.classList.add('is-active');
          }
        });
      }, { rootMargin: '-40% 0px -55% 0px', threshold: 0 });

      sections.forEach(s => observer.observe(s));
    }
  }

  /* ─── Scroll Reveal ──────────────────────────────────────── */
  function initScrollReveal() {
    if (prefersReducedMotion) return;

    const elements = $$('.ss-servicio, .ss-paso, .ss-proyecto, .ss-stat, .ss-sobre__img-wrap, .ss-form, .ss-section-header');
    elements.forEach(el => el.classList.add('ss-reveal'));

    const observer = new IntersectionObserver(entries => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          /* Stagger siblings in same parent */
          const siblings = $$('.ss-reveal', entry.target.parentElement);
          const idx = siblings.indexOf(entry.target);
          entry.target.style.transitionDelay = `${idx * 60}ms`;
          entry.target.classList.add('is-visible');
          observer.unobserve(entry.target);
        }
      });
    }, { threshold: 0.12, rootMargin: '0px 0px -40px 0px' });

    elements.forEach(el => observer.observe(el));
  }

  /* ─── Marquee: pause on hover ────────────────────────────── */
  function initMarquee() {
    const track = $('.ss-hero__marquee-track');
    if (!track) return;
    const marquee = track.parentElement;
    marquee.addEventListener('mouseenter', () => { track.style.animationPlayState = 'paused'; });
    marquee.addEventListener('mouseleave', () => { track.style.animationPlayState = 'running'; });
  }

  /* ─── Contact Form ────────────────────────────────────────── */
  function initForm() {
    const form    = $('#ss-contact-form');
    if (!form) return;

    const nombre  = $('#ss-nombre');
    const mensaje = $('#ss-mensaje');
    const submit  = $('#ss-submit');
    const success = $('#ss-form-success');

    function setError(field, errorEl, msg) {
      field.classList.toggle('is-error', Boolean(msg));
      errorEl.textContent = msg || '';
    }

    function validateNombre() {
      if (!nombre.value.trim()) {
        setError(nombre, $('#ss-nombre-error'), 'El nombre es obligatorio.');
        return false;
      }
      setError(nombre, $('#ss-nombre-error'), '');
      return true;
    }

    function validateMensaje() {
      if (!mensaje.value.trim()) {
        setError(mensaje, $('#ss-mensaje-error'), 'El mensaje no puede estar vacío.');
        return false;
      }
      if (mensaje.value.trim().length < 10) {
        setError(mensaje, $('#ss-mensaje-error'), 'El mensaje es demasiado corto.');
        return false;
      }
      setError(mensaje, $('#ss-mensaje-error'), '');
      return true;
    }

    /* Validate on blur */
    nombre.addEventListener('blur', validateNombre);
    mensaje.addEventListener('blur', validateMensaje);

    /* Clear error on input */
    nombre.addEventListener('input', () => {
      if (nombre.classList.contains('is-error')) validateNombre();
    });
    mensaje.addEventListener('input', () => {
      if (mensaje.classList.contains('is-error')) validateMensaje();
    });

    /* Submit */
    form.addEventListener('submit', async e => {
      e.preventDefault();

      const validName = validateNombre();
      const validMsg  = validateMensaje();

      if (!validName) { nombre.focus(); return; }
      if (!validMsg)  { mensaje.focus(); return; }

      /* Loading state */
      submit.classList.add('ss-btn--loading');
      submit.disabled = true;

      try {
        /* WordPress AJAX or REST endpoint — stub for now */
        await new Promise(res => setTimeout(res, 1200));

        form.reset();
        success.textContent = 'Mensaje enviado. Te respondo en menos de 24 horas.';
        success.classList.add('is-visible');
        success.scrollIntoView({ behavior: 'smooth', block: 'nearest' });

        setTimeout(() => success.classList.remove('is-visible'), 8000);
      } catch {
        setError(mensaje, $('#ss-mensaje-error'), 'Error al enviar. Intenta de nuevo.');
        mensaje.focus();
      } finally {
        submit.classList.remove('ss-btn--loading');
        submit.disabled = false;
      }
    });
  }

  /* ─── Portfolio hover cursor (desktop) ───────────────────── */
  function initPortfolioCursor() {
    if (prefersReducedMotion || window.matchMedia('(pointer: coarse)').matches) return;

    const proyectos = $$('.ss-proyecto');
    proyectos.forEach(p => {
      p.style.cursor = 'pointer';
    });
  }

  /* ─── Smooth scroll for anchor links ─────────────────────── */
  function initSmoothScroll() {
    if (prefersReducedMotion) return;
    $$('a[href^="#"]').forEach(link => {
      link.addEventListener('click', e => {
        const id = link.getAttribute('href').slice(1);
        const target = document.getElementById(id);
        if (!target) return;
        e.preventDefault();
        const navH = parseInt(getComputedStyle(document.documentElement).getPropertyValue('--nav-h') || '72');
        const top  = target.getBoundingClientRect().top + window.scrollY - navH;
        window.scrollTo({ top, behavior: 'smooth' });
      });
    });
  }

  /* ─── Init ────────────────────────────────────────────────── */
  function init() {
    initNav();
    initScrollReveal();
    initMarquee();
    initForm();
    initPortfolioCursor();
    initSmoothScroll();
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', init);
  } else {
    init();
  }

})();
