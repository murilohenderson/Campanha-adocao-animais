// script.js

// --- DADOS MOCKADOS (simulam Firebase)
const MOCK_ANIMALS = [
  {
    id: '1',
    name: "Chanel",
    species: "Gato",
    age: "Sem idade definida",
    size: "Pequeno",
    gender: "Fêmea",
    img: "assets/ChanelPhoto.jpeg",
    description: "Chanel foi resgatada ainda filhote e procura por um abrigo desde então. Dê uma nova casa para Chanel!",
    vaccinated: false,
    neutered: false,
    ong: "MEADOTE"
  },
  // demais animais conforme arquivo original...
];

const MOCK_EVENTS = [
  {
    id: 1,
    title: "Feira de Adoção",
    date: "DOM TODO INÍCIO",
    time: "9h-12h",
    location: "Praça da República, PA",
    type: "Adoção",
    description: "Venha conhecer animais prontos para adoção todo domingo na Praça da República. Te esperamos!"
  }
  // demais eventos...
];

const MOCK_ARTICLES = [
  {
    id: 1,
    title: "Educação e conscientização",
    category: "Educação",
    date: "21 Nov 2025",
    summary: "A chamada adoção responsável é feita com consciência e respeito.",
    content: `<p>A chamada adoção responsável é feita com consciência e respeito...</p>`
  }
];

const MOCK_PARTNERS = [
  {
    id: '1',
    name: "Profa. Giselle Almeida Couceiro",
    role: "Coordenadora e Professora - Medicina Veterinária",
    img: "assets/GisellePhoto.jpg",
    summary: "Graduada em Saúde Pública e Medicina Veterinária...",
    details: `<p><strong>Profa. Giselle Almeida Couceiro</strong></p><ul class="list-disc pl-5 space-y-2 text-slate-600 mt-2">...</ul>`
  }
];

// --- Configuração do App
window.app = {
  currentPage: 'home',
  animals: MOCK_ANIMALS,
  events: MOCK_EVENTS,
  articles: MOCK_ARTICLES,
  partners: MOCK_PARTNERS,

  init: async () => {
    // Inicialização futura com Firebase (opcional)
    window.app.navigateTo('home');
    lucide.createIcons();
  },

  navigateTo: (pageId) => {
    window.app.currentPage = pageId;
    if (pageId !== 'home') window.app.toggleMobileMenu(false);
    document.getElementById('app-content').innerHTML = window.app.renderPage(pageId);
    window.scrollTo({ top: 0, behavior: 'smooth' });
    lucide.createIcons();
  },

  renderPage: (pageId) => {
    switch (pageId) {
      case 'home': return window.app.renderHome();
      case 'adoption': return window.app.renderAdoption();
      case 'events': return window.app.renderEvents();
      case 'articles': return window.app.renderArticles();
      case 'transparency': return window.app.renderTransparency();
      case 'donate': return window.app.renderDonate();
      case 'how-it-works': return window.app.renderHowItWorks();
      case 'volunteer': return window.app.renderVolunteer();
      default: return window.app.renderHome();
    }
  },

  toggleMobileMenu: (forceState) => {
    const menu = document.getElementById('mobile-menu');
    if (forceState !== undefined) {
      menu.classList.toggle('hidden', !forceState);
    } else {
      menu.classList.toggle('hidden');
    }
  },

  // Funções de renderização (mantidas como no original, mas organizadas)
  renderHome: () => { /* ... */ },
  renderAdoption: () => { /* ... */ },
  renderEvents: () => { /* ... */ },
  renderArticles: () => { /* ... */ },
  renderTransparency: () => { /* ... */ },
  renderDonate: () => { /* ... */ },
  renderHowItWorks: () => { /* ... */ },
  renderVolunteer: () => { /* ... */ },

  renderAnimalCard: (animal) => { /* ... */ },
  renderPartnerCard: (partner) => { /* ... */ },

  // Modais
  openModal: (id) => { /* ... */ },
  closeModal: () => { /* ... */ },
  openArticleModal: (id) => { /* ... */ },
  openPartnerModal: (id) => { /* ... */ },
  openDonateModal: () => {
    const overlay = document.getElementById('donate-modal-overlay');
    overlay.classList.remove('hidden');
    setTimeout(() => {
      overlay.classList.remove('opacity-0');
      document.getElementById('donate-modal-content').classList.remove('scale-95');
      document.getElementById('donate-modal-content').classList.add('scale-100');
    }, 10);
    document.body.style.overflow = 'hidden';
  },
  closeDonateModal: () => {
    const overlay = document.getElementById('donate-modal-overlay');
    const content = document.getElementById('donate-modal-content');
    overlay.classList.add('opacity-0');
    content.classList.remove('scale-100');
    content.classList.add('scale-95');
    setTimeout(() => {
      overlay.classList.add('hidden');
      document.body.style.overflow = 'auto';
    }, 300);
  }
};

// Inicialização
document.addEventListener('DOMContentLoaded', () => {
  app.init();
});