import { useState, useEffect, useRef } from "react";
import {
  Menu, X, Download, Mail, Phone, Github, Linkedin, Instagram,
  ExternalLink, ChevronUp, ArrowRight, Award, Briefcase,
  Eye, ChevronRight, Clock, Calendar, MapPin, Send,
} from "lucide-react";

// ─── helpers ─────────────────────────────────────────────────────────────────

function cn(...classes: (string | false | undefined | null)[]) {
  return classes.filter(Boolean).join(" ");
}

function useInView(threshold = 0.15) {
  const ref = useRef<HTMLElement>(null);
  const [visible, setVisible] = useState(false);
  useEffect(() => {
    const el = ref.current;
    if (!el) return;
    const obs = new IntersectionObserver(
      ([entry]) => { if (entry.isIntersecting) { setVisible(true); obs.disconnect(); } },
      { threshold }
    );
    obs.observe(el);
    return () => obs.disconnect();
  }, [threshold]);
  return { ref, visible };
}

// ─── palette ─────────────────────────────────────────────────────────────────

const C = {
  bg: "#FFFFFF",
  bgSoft: "#FDF7F7",
  bgMuted: "#F5F0F0",
  card: "rgba(255,255,255,0.88)",
  maroon: "#800020",
  maroonDark: "#5C0011",
  maroonLight: "#C41E3A",
  maroonPale: "rgba(128,0,32,0.08)",
  maroonBorder: "rgba(128,0,32,0.15)",
  maroonBorderStrong: "rgba(128,0,32,0.3)",
  gradMain: "linear-gradient(135deg,#800020,#C41E3A)",
  gradDark: "linear-gradient(135deg,#5C0011,#800020)",
  text: "#1A1A1A",
  textSub: "#4B1A1A",
  textMuted: "#6B7280",
  textFaint: "#9CA3AF",
  white: "#FFFFFF",
  shadow: "0 4px 24px rgba(128,0,32,0.12)",
  shadowHover: "0 8px 32px rgba(128,0,32,0.22)",
  glowMaroon: "0 0 24px rgba(128,0,32,0.25)",
};

// ─── data ─────────────────────────────────────────────────────────────────────

const NAV_LINKS = [
  { label: "Home", href: "#home" },
  { label: "About", href: "#about" },
  { label: "Skills", href: "#skills" },
  { label: "Portfolio", href: "#portfolio" },
  { label: "Experience", href: "#experience" },
  { label: "Certificates", href: "#certificates" },
  { label: "Education", href: "#education" },
  { label: "Blog", href: "#blog" },
  { label: "Contact", href: "#contact" },
];

const SKILLS = {
  "Programming Languages": [
    { name: "PHP", icon: "🐘", level: 90 },
    { name: "JavaScript", icon: "⚡", level: 88 },
    { name: "Python", icon: "🐍", level: 75 },
    { name: "SQL", icon: "🗄️", level: 85 },
  ],
  Frameworks: [
    { name: "Laravel", icon: "🔴", level: 92 },
    { name: "Livewire", icon: "⚡", level: 85 },
    { name: "Filament", icon: "🛡️", level: 88 },
    { name: "Bootstrap", icon: "🅱️", level: 82 },
    { name: "Tailwind CSS", icon: "🌊", level: 90 },
  ],
  Database: [
    { name: "MySQL", icon: "🐬", level: 88 },
    { name: "PostgreSQL", icon: "🐘", level: 78 },
  ],
  Tools: [
    { name: "Git", icon: "🔀", level: 85 },
    { name: "GitHub", icon: "🐙", level: 87 },
    { name: "VS Code", icon: "💻", level: 95 },
    { name: "Figma", icon: "🎨", level: 80 },
    { name: "Docker", icon: "🐳", level: 72 },
    { name: "Postman", icon: "📮", level: 84 },
  ],
  "Other Skills": [
    { name: "REST API", icon: "🔌", level: 88 },
    { name: "UI/UX Design", icon: "✨", level: 80 },
    { name: "Database Design", icon: "🗂️", level: 85 },
    { name: "Software Engineering", icon: "⚙️", level: 82 },
    { name: "Cyber Security Basics", icon: "🔒", level: 70 },
    { name: "Blockchain Basics", icon: "⛓️", level: 65 },
  ],
};

const PROJECTS = [
  {
    name: "Pharmacy Management System",
    description: "A comprehensive pharmacy management system with inventory tracking, prescription management, sales reporting, and customer management built for real-world pharmacy operations.",
    tech: ["Laravel", "Filament", "MySQL", "Tailwind CSS", "Livewire"],
    image: "https://images.unsplash.com/photo-1584308666744-24d5c474f2ae?w=600&h=400&fit=crop&auto=format",
    github: "#", demo: "#", featured: true,
  },
  {
    name: "Crypto Trading Signal Bot",
    description: "Automated cryptocurrency trading signal bot that analyzes market data, generates buy/sell signals using technical indicators, and sends alerts via Telegram.",
    tech: ["Python", "REST API", "PostgreSQL", "Telegram Bot API"],
    image: "https://images.unsplash.com/photo-1642790106117-e829e14a795f?w=600&h=400&fit=crop&auto=format",
    github: "#", demo: "#", featured: true,
  },
  {
    name: "E-Commerce Website",
    description: "Full-featured e-commerce platform with product catalog, cart management, payment gateway integration, order tracking, and an admin dashboard.",
    tech: ["Laravel", "MySQL", "Midtrans", "Bootstrap", "jQuery"],
    image: "https://images.unsplash.com/photo-1563013544-824ae1b704d3?w=600&h=400&fit=crop&auto=format",
    github: "#", demo: "#", featured: false,
  },
  {
    name: "Inventory Management System",
    description: "Real-time inventory management system with barcode scanning, stock alerts, supplier management, purchase orders, and detailed analytics dashboard.",
    tech: ["Laravel", "Livewire", "Filament", "MySQL", "Alpine.js"],
    image: "https://images.unsplash.com/photo-1553413077-190dd305871c?w=600&h=400&fit=crop&auto=format",
    github: "#", demo: "#", featured: false,
  },
  {
    name: "Company Profile Website",
    description: "Modern and responsive company profile website with dynamic content management, service showcase, team profiles, and contact form with email notifications.",
    tech: ["Laravel", "Filament", "Tailwind CSS", "Alpine.js"],
    image: "https://images.unsplash.com/photo-1497366216548-37526070297c?w=600&h=400&fit=crop&auto=format",
    github: "#", demo: "#", featured: false,
  },
  {
    name: "Student Attendance System",
    description: "Digital attendance system with QR code scanning, geolocation validation, real-time dashboard, leave management, and automated report generation.",
    tech: ["Laravel", "MySQL", "QR Code", "Livewire", "Tailwind CSS"],
    image: "https://images.unsplash.com/photo-1522202176988-66273c2fd55f?w=600&h=400&fit=crop&auto=format",
    github: "#", demo: "#", featured: false,
  },
];

const EXPERIENCES = [
  {
    role: "Freelance Full Stack Web Developer",
    company: "Self-Employed",
    period: "2022 – Present",
    type: "Freelance",
    description: "Delivering custom web applications for clients across various industries. Projects include e-commerce platforms, company profiles, management systems, and API integrations.",
    skills: ["Laravel", "PHP", "MySQL", "Tailwind CSS", "Filament"],
    color: "#800020",
  },
  {
    role: "UI/UX Designer",
    company: "Various Clients",
    period: "2021 – Present",
    type: "Freelance",
    description: "Designing user interfaces and experiences for mobile apps and web platforms. Creating wireframes, prototypes, and high-fidelity mockups using Figma.",
    skills: ["Figma", "Adobe XD", "Prototyping", "User Research"],
    color: "#C41E3A",
  },
  {
    role: "Laravel Developer",
    company: "Academic Projects – Universitas Bina Sarana Informatika",
    period: "2023 – Present",
    type: "Academic",
    description: "Building production-quality web applications as part of coursework and collaborative projects. Applying software engineering principles and best practices.",
    skills: ["Laravel", "Livewire", "PostgreSQL", "REST API", "Docker"],
    color: "#9B1C1C",
  },
  {
    role: "Informatics Engineering Intern",
    company: "Academic Lab Assistant",
    period: "2024",
    type: "Academic",
    description: "Assisted lecturers in programming laboratory sessions, helped students debug code, and maintained lab documentation and project archives.",
    skills: ["Teaching", "PHP", "MySQL", "Python", "Git"],
    color: "#5C0011",
  },
];

const CERTIFICATES = [
  { name: "Laravel: From Beginner to Advanced", issuer: "Udemy", date: "2023", image: "https://images.unsplash.com/photo-1614741118887-7a4ee193a5fa?w=400&h=280&fit=crop&auto=format", color: "#800020" },
  { name: "Web Development Bootcamp", issuer: "Dicoding Indonesia", date: "2023", image: "https://images.unsplash.com/photo-1517694712202-14dd9538aa97?w=400&h=280&fit=crop&auto=format", color: "#C41E3A" },
  { name: "Python for Data Science", issuer: "Coursera / IBM", date: "2024", image: "https://images.unsplash.com/photo-1526374965328-7f61d4dc18c5?w=400&h=280&fit=crop&auto=format", color: "#9B1C1C" },
  { name: "UI/UX Design Fundamentals", issuer: "Google / Coursera", date: "2023", image: "https://images.unsplash.com/photo-1561070791-2526d30994b5?w=400&h=280&fit=crop&auto=format", color: "#7F1D1D" },
  { name: "Cybersecurity Essentials", issuer: "Cisco Networking Academy", date: "2024", image: "https://images.unsplash.com/photo-1550751827-4bd374c3f58b?w=400&h=280&fit=crop&auto=format", color: "#5C0011" },
  { name: "Git & GitHub Masterclass", issuer: "Udemy", date: "2022", image: "https://images.unsplash.com/photo-1618401471353-b98afee0b2eb?w=400&h=280&fit=crop&auto=format", color: "#991B1B" },
];

const EDUCATION = [
  { level: "Universitas Bina Sarana Informatika", field: "Informatics Engineering (Teknik Informatika)", period: "2023 – Present", gpa: "3.85 / 4.00", icon: "🎓", current: true },
  { level: "SMA Negeri 1 Tasikmalaya", field: "Science / IPA", period: "2020 – 2023", icon: "🏫", current: false },
  { level: "SMP Negeri 2 Tasikmalaya", field: "Junior High School", period: "2017 – 2020", icon: "🏛️", current: false },
  { level: "SD Negeri Cipedes", field: "Elementary School", period: "2011 – 2017", icon: "📚", current: false },
];

const ACHIEVEMENTS = [
  { title: "1st Place – Web Dev Competition", org: "Universitas Bina Sarana Informatika", year: "2024", icon: "🥇", color: "#800020", category: "Competition" },
  { title: "Best Graduate Project Award", org: "Faculty of Informatics Engineering", year: "2024", icon: "🏆", color: "#C41E3A", category: "Academic" },
  { title: "Merit Scholarship Recipient", org: "Universitas Bina Sarana Informatika", year: "2023", icon: "🎓", color: "#9B1C1C", category: "Scholarship" },
  { title: "Finalist – National Hackathon", org: "Kemendikbud Digital Innovation 2024", year: "2024", icon: "🚀", color: "#7F1D1D", category: "Competition" },
  { title: "Dean's List – Semester 1 & 2", org: "Universitas Bina Sarana Informatika", year: "2023–2024", icon: "⭐", color: "#5C0011", category: "Academic" },
  { title: "Open Source Contributor Badge", org: "GitHub Arctic Code Vault", year: "2023", icon: "❄️", color: "#991B1B", category: "Certification" },
];

const BLOG_POSTS = [
  {
    title: "Building Scalable REST APIs with Laravel 11 and Sanctum",
    excerpt: "A deep dive into architecting production-grade REST APIs using Laravel 11, Sanctum authentication, and best practices for API versioning.",
    date: "June 28, 2025", category: "Backend", readTime: "8 min read", color: "#800020",
    image: "https://images.unsplash.com/photo-1555066931-4365d14bab8c?w=600&h=380&fit=crop&auto=format",
  },
  {
    title: "Glassmorphism UI: Frosted Glass Effects with Tailwind CSS",
    excerpt: "A practical guide to creating stunning glassmorphism cards, modals, and navbars using Tailwind CSS utility classes and custom backdrop blur.",
    date: "June 10, 2025", category: "UI/UX", readTime: "5 min read", color: "#C41E3A",
    image: "https://images.unsplash.com/photo-1558591710-4b4a1ae0f04d?w=600&h=380&fit=crop&auto=format",
  },
  {
    title: "My Experience Using Filament v3 for Admin Panel Development",
    excerpt: "Honest review of Filament Admin Panel v3 after shipping three production projects — performance, extensibility, and lessons learned.",
    date: "May 22, 2025", category: "Laravel", readTime: "6 min read", color: "#9B1C1C",
    image: "https://images.unsplash.com/photo-1461749280684-dccba630e2f6?w=600&h=380&fit=crop&auto=format",
  },
  {
    title: "Introduction to Blockchain: A Developer's Perspective",
    excerpt: "Breaking down blockchain fundamentals — consensus mechanisms, smart contracts, and how developers can start building decentralized apps.",
    date: "May 5, 2025", category: "Blockchain", readTime: "10 min read", color: "#5C0011",
    image: "https://images.unsplash.com/photo-1639762681485-074b7f938ba0?w=600&h=380&fit=crop&auto=format",
  },
];

// ─── shared components ────────────────────────────────────────────────────────

function GlassCard({ children, className = "", style = {}, ring = false }: {
  children: React.ReactNode; className?: string; style?: React.CSSProperties; ring?: boolean;
}) {
  return (
    <div
      className={cn("rounded-2xl border transition-all duration-300", className)}
      style={{
        background: "rgba(255,255,255,0.9)",
        backdropFilter: "blur(16px)",
        border: `1px solid ${ring ? "rgba(128,0,32,0.35)" : "rgba(128,0,32,0.12)"}`,
        boxShadow: "0 2px 16px rgba(128,0,32,0.07)",
        ...style,
      }}
    >
      {children}
    </div>
  );
}

function SectionTitle({ label, title, subtitle }: { label: string; title: string; subtitle?: string }) {
  return (
    <div className="text-center mb-16">
      <span className="inline-block px-4 py-1.5 rounded-full text-xs font-semibold tracking-widest uppercase mb-4"
        style={{ background: C.maroonPale, color: C.maroon, border: `1px solid ${C.maroonBorder}`, fontFamily: "Inter, sans-serif" }}>
        {label}
      </span>
      <h2 className="text-4xl md:text-5xl font-bold mb-4" style={{ fontFamily: "Poppins, sans-serif", color: C.text }}>
        {title}
      </h2>
      {subtitle && (
        <p className="text-base md:text-lg max-w-2xl mx-auto" style={{ color: C.textMuted, fontFamily: "Inter, sans-serif" }}>
          {subtitle}
        </p>
      )}
    </div>
  );
}

function FadeIn({ children, delay = 0, visible }: { children: React.ReactNode; delay?: number; visible: boolean }) {
  return (
    <div style={{
      opacity: visible ? 1 : 0,
      transform: visible ? "translateY(0)" : "translateY(28px)",
      transition: `opacity 0.6s ease ${delay}ms, transform 0.6s ease ${delay}ms`,
    }}>
      {children}
    </div>
  );
}

// ─── navbar ───────────────────────────────────────────────────────────────────

function Navbar({ active, menuOpen, setMenuOpen }: { active: string; menuOpen: boolean; setMenuOpen: (v: boolean) => void }) {
  const [scrolled, setScrolled] = useState(false);
  useEffect(() => {
    const fn = () => setScrolled(window.scrollY > 40);
    window.addEventListener("scroll", fn, { passive: true });
    return () => window.removeEventListener("scroll", fn);
  }, []);

  return (
    <header className="fixed top-0 left-0 right-0 z-50 transition-all duration-300"
      style={{
        background: scrolled ? "rgba(255,255,255,0.95)" : "transparent",
        backdropFilter: scrolled ? "blur(20px)" : "none",
        borderBottom: scrolled ? `1px solid ${C.maroonBorder}` : "1px solid transparent",
        boxShadow: scrolled ? "0 2px 20px rgba(128,0,32,0.08)" : "none",
      }}>
      <nav className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex items-center justify-between h-16">
        <a href="#home" className="font-bold text-xl tracking-tight" style={{ fontFamily: "Poppins, sans-serif", background: C.gradMain, WebkitBackgroundClip: "text", WebkitTextFillColor: "transparent" }}>
          FAB.
        </a>
        <ul className="hidden lg:flex items-center gap-1">
          {NAV_LINKS.map(({ label, href }) => (
            <li key={href}>
              <a href={href}
                className="px-3 py-1.5 rounded-lg text-sm font-medium transition-all duration-200"
                style={{
                  fontFamily: "Inter, sans-serif",
                  color: active === href.slice(1) ? C.maroon : C.textMuted,
                  background: active === href.slice(1) ? C.maroonPale : "transparent",
                  fontWeight: active === href.slice(1) ? 600 : 400,
                }}>
                {label}
              </a>
            </li>
          ))}
        </ul>
        <a href="#contact"
          className="hidden lg:inline-flex items-center gap-2 px-4 py-2 rounded-lg text-sm font-semibold text-white transition-all duration-200 hover:scale-105"
          style={{ background: C.gradMain, boxShadow: C.glowMaroon, fontFamily: "Inter, sans-serif" }}>
          Hire Me <ArrowRight className="w-3.5 h-3.5" />
        </a>
        <button className="lg:hidden p-2 rounded-lg" style={{ color: C.textMuted }} onClick={() => setMenuOpen(!menuOpen)}>
          {menuOpen ? <X className="w-5 h-5" /> : <Menu className="w-5 h-5" />}
        </button>
      </nav>
      {menuOpen && (
        <div className="lg:hidden px-4 pb-4 pt-2"
          style={{ background: "rgba(255,255,255,0.98)", backdropFilter: "blur(20px)", borderBottom: `1px solid ${C.maroonBorder}` }}>
          {NAV_LINKS.map(({ label, href }) => (
            <a key={href} href={href} onClick={() => setMenuOpen(false)}
              className="block px-4 py-3 rounded-lg text-sm font-medium mb-1 transition-colors"
              style={{ fontFamily: "Inter, sans-serif", color: C.textMuted }}>
              {label}
            </a>
          ))}
        </div>
      )}
    </header>
  );
}

// ─── hero ─────────────────────────────────────────────────────────────────────

function HeroSection() {
  const { ref, visible } = useInView(0.05);
  const [titleIdx, setTitleIdx] = useState(0);
  const subtitles = ["Full Stack Web Developer", "UI/UX Enthusiast", "Informatics Engineering Student"];
  useEffect(() => {
    const id = setInterval(() => setTitleIdx(i => (i + 1) % subtitles.length), 2800);
    return () => clearInterval(id);
  }, []);

  return (
    <section id="home" ref={ref as React.Ref<HTMLElement>}
      className="min-h-screen flex items-center justify-center relative overflow-hidden pt-16"
      style={{ background: `linear-gradient(160deg, #FFF5F5 0%, #FFFFFF 50%, #FDF0F0 100%)` }}>

      {/* decorative background shapes */}
      <div className="absolute inset-0 overflow-hidden pointer-events-none">
        <div className="absolute -top-32 -left-32 w-96 h-96 rounded-full opacity-25 blur-3xl"
          style={{ background: "radial-gradient(circle,#C41E3A,transparent)" }} />
        <div className="absolute top-1/3 -right-48 w-[500px] h-[500px] rounded-full opacity-15 blur-3xl"
          style={{ background: "radial-gradient(circle,#800020,transparent)" }} />
        <div className="absolute bottom-0 left-1/4 w-80 h-80 rounded-full opacity-10 blur-3xl"
          style={{ background: "radial-gradient(circle,#9B1C1C,transparent)" }} />
        {/* subtle dot grid */}
        <div className="absolute inset-0"
          style={{ backgroundImage: `radial-gradient(circle, rgba(128,0,32,0.06) 1px, transparent 1px)`, backgroundSize: "40px 40px" }} />
      </div>

      <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid lg:grid-cols-2 gap-16 items-center w-full py-20 relative z-10">

        {/* left */}
        <FadeIn visible={visible}>
          <div>
            <span className="inline-block px-4 py-1.5 rounded-full text-xs font-semibold tracking-widest uppercase mb-6"
              style={{ background: C.maroonPale, color: C.maroon, border: `1px solid ${C.maroonBorder}`, fontFamily: "Inter, sans-serif" }}>
              👋 Welcome to my portfolio
            </span>
            <h1 className="font-bold leading-tight mb-3"
              style={{ fontFamily: "Poppins, sans-serif", fontSize: "clamp(2.2rem,5vw,3.8rem)", color: C.text }}>
              Hi, I&apos;m<br />
              <span style={{ background: C.gradMain, WebkitBackgroundClip: "text", WebkitTextFillColor: "transparent" }}>
                Fadhil Afiq<br />Badruzzaman
              </span>
            </h1>
            <div className="h-8 mb-6 overflow-hidden">
              <p key={titleIdx} className="text-lg font-semibold"
                style={{ color: C.maroon, fontFamily: "Inter, sans-serif", animation: "slideUp 0.4s ease" }}>
                {subtitles[titleIdx]}
              </p>
            </div>
            <p className="text-base leading-relaxed mb-8 max-w-lg"
              style={{ color: C.textMuted, fontFamily: "Inter, sans-serif" }}>
              Passionate about building robust, scalable web applications and exploring the frontiers of software engineering, AI, cybersecurity, and blockchain technology. I turn complex problems into elegant digital solutions.
            </p>
            <div className="flex flex-wrap gap-4">
              <a href="#"
                className="inline-flex items-center gap-2 px-6 py-3 rounded-xl text-sm font-semibold text-white transition-all duration-200 hover:scale-105"
                style={{ background: C.gradMain, boxShadow: C.glowMaroon, fontFamily: "Inter, sans-serif" }}>
                <Download className="w-4 h-4" /> Download CV
              </a>
              <a href="#contact"
                className="inline-flex items-center gap-2 px-6 py-3 rounded-xl text-sm font-semibold transition-all duration-200 hover:scale-105"
                style={{ border: `1.5px solid ${C.maroonBorderStrong}`, color: C.maroon, background: C.maroonPale, fontFamily: "Inter, sans-serif" }}>
                <Mail className="w-4 h-4" /> Contact Me
              </a>
            </div>
            <div className="flex items-center gap-4 mt-8">
              {[
                { icon: Github, href: "#", label: "GitHub" },
                { icon: Linkedin, href: "#", label: "LinkedIn" },
                { icon: Instagram, href: "#", label: "Instagram" },
                { icon: Mail, href: "mailto:fadhil@example.com", label: "Email" },
              ].map(({ icon: Icon, href, label }) => (
                <a key={label} href={href} aria-label={label}
                  className="w-9 h-9 rounded-lg flex items-center justify-center transition-all duration-200 hover:scale-110"
                  style={{ background: C.maroonPale, border: `1px solid ${C.maroonBorder}`, color: C.maroon }}>
                  <Icon className="w-4 h-4" />
                </a>
              ))}
            </div>
            <div className="flex items-center gap-10 mt-10">
              {[["15+", "Projects"], ["3+", "Years Exp."], ["10+", "Certificates"]].map(([n, l]) => (
                <div key={l}>
                  <p className="text-2xl font-bold" style={{ fontFamily: "Poppins, sans-serif", background: C.gradMain, WebkitBackgroundClip: "text", WebkitTextFillColor: "transparent" }}>{n}</p>
                  <p className="text-xs" style={{ color: C.textMuted, fontFamily: "Inter, sans-serif" }}>{l}</p>
                </div>
              ))}
            </div>
          </div>
        </FadeIn>

        {/* right – avatar */}
        <FadeIn visible={visible} delay={180}>
          <div className="flex justify-center">
            <div className="relative w-72 h-72 lg:w-80 lg:h-80">
              <div className="absolute inset-0 rounded-full opacity-25"
                style={{ border: "2px dashed #C41E3A", animation: "spin 22s linear infinite" }} />
              <div className="absolute -inset-5 rounded-full opacity-15"
                style={{ border: "2px dashed #800020", animation: "spin 35s linear infinite reverse" }} />
              <div className="absolute inset-3 rounded-full blur-2xl opacity-30"
                style={{ background: "radial-gradient(circle,#C41E3A,#800020,transparent)" }} />
              {/* avatar circle */}
              <div className="absolute inset-6 rounded-full overflow-hidden"
                style={{ border: "4px solid transparent", background: `${C.gradMain} border-box`, padding: "3px" }}>
                <div className="w-full h-full rounded-full flex items-center justify-center"
                  style={{ background: C.gradMain }}>
                  <span className="text-6xl font-bold text-white select-none" style={{ fontFamily: "Poppins, sans-serif" }}>FA</span>
                </div>
              </div>
              {/* floating badges */}
              {[
                { label: "Laravel", icon: "🔴", top: "5%", right: "-8%" },
                { label: "Full Stack", icon: "⚡", bottom: "12%", left: "-10%" },
                { label: "UI/UX", icon: "🎨", top: "42%", right: "-14%" },
              ].map(({ label, icon, ...pos }) => (
                <div key={label}
                  className="absolute flex items-center gap-1.5 px-3 py-1.5 rounded-lg text-xs font-semibold"
                  style={{
                    ...pos,
                    background: "rgba(255,255,255,0.95)",
                    border: `1px solid ${C.maroonBorder}`,
                    color: C.text,
                    backdropFilter: "blur(8px)",
                    boxShadow: "0 2px 12px rgba(128,0,32,0.12)",
                    fontFamily: "Inter, sans-serif",
                  }}>
                  <span>{icon}</span>{label}
                </div>
              ))}
            </div>
          </div>
        </FadeIn>
      </div>

      <div className="absolute bottom-8 left-1/2 -translate-x-1/2 flex flex-col items-center gap-2 opacity-40">
        <p className="text-xs" style={{ color: C.textMuted, fontFamily: "Inter, sans-serif" }}>Scroll</p>
        <div className="w-px h-8" style={{ background: `linear-gradient(to bottom,${C.maroon},transparent)` }} />
      </div>

      <style>{`
        @keyframes spin { from { transform: rotate(0deg); } to { transform: rotate(360deg); } }
        @keyframes slideUp { from { opacity:0; transform:translateY(12px); } to { opacity:1; transform:translateY(0); } }
      `}</style>
    </section>
  );
}

// ─── about ────────────────────────────────────────────────────────────────────

function AboutSection() {
  const { ref, visible } = useInView();
  return (
    <section id="about" ref={ref as React.Ref<HTMLElement>} className="py-24"
      style={{ background: C.bgSoft }}>
      <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <FadeIn visible={visible}>
          <SectionTitle label="About Me" title="Get to Know Me"
            subtitle="A passionate developer who loves turning ideas into reality through clean code and thoughtful design." />
        </FadeIn>
        <div className="grid lg:grid-cols-2 gap-12 items-start">
          <FadeIn visible={visible} delay={100}>
            <GlassCard className="p-8">
              <h3 className="text-xl font-bold mb-4" style={{ fontFamily: "Poppins, sans-serif", color: C.text }}>Biography</h3>
              <p className="text-sm leading-relaxed mb-4" style={{ color: C.textMuted, fontFamily: "Inter, sans-serif" }}>
                I&apos;m Fadhil Afiq Badruzzaman, an Informatics Engineering student with a deep passion for software engineering and web development. My journey in programming started in high school, and since then I&apos;ve been constantly learning and building.
              </p>
              <p className="text-sm leading-relaxed mb-6" style={{ color: C.textMuted, fontFamily: "Inter, sans-serif" }}>
                I specialize in building full-stack web applications using Laravel and modern frontend technologies. Beyond web development, I&apos;m actively exploring artificial intelligence, cybersecurity, and blockchain — fields I believe will shape the future of technology.
              </p>
              <h3 className="text-xl font-bold mb-4" style={{ fontFamily: "Poppins, sans-serif", color: C.text }}>Career Objective</h3>
              <p className="text-sm leading-relaxed" style={{ color: C.textMuted, fontFamily: "Inter, sans-serif" }}>
                To contribute to innovative software projects in a dynamic environment where I can leverage my full-stack skills, apply best engineering practices, and continue growing as a professional developer while making meaningful impact.
              </p>
            </GlassCard>
          </FadeIn>
          <div className="flex flex-col gap-6">
            <FadeIn visible={visible} delay={200}>
              <GlassCard className="p-6">
                <h3 className="text-lg font-bold mb-4" style={{ fontFamily: "Poppins, sans-serif", color: C.text }}>Personal Information</h3>
                <div className="grid grid-cols-2 gap-4">
                  {[
                    ["Full Name", "Fadhil Afiq Badruzzaman"],
                    ["Location", "Tasikmalaya, Indonesia"],
                    ["Email", "fadhil@example.com"],
                    ["Phone", "+62 812 3456 7890"],
                    ["University", "Universitas BSI"],
                    ["Major", "Informatics Engineering"],
                    ["Status", "Active Student"],
                    ["Languages", "Indonesian, English"],
                  ].map(([label, value]) => (
                    <div key={label}>
                      <p className="text-xs font-semibold mb-0.5" style={{ color: C.maroon, fontFamily: "Inter, sans-serif" }}>{label}</p>
                      <p className="text-sm" style={{ color: C.text, fontFamily: "Inter, sans-serif" }}>{value}</p>
                    </div>
                  ))}
                </div>
              </GlassCard>
            </FadeIn>
            <FadeIn visible={visible} delay={300}>
              <GlassCard className="p-6">
                <h3 className="text-lg font-bold mb-4" style={{ fontFamily: "Poppins, sans-serif", color: C.text }}>Interests</h3>
                <div className="flex flex-wrap gap-2">
                  {["Web Development", "AI & Machine Learning", "Cybersecurity", "Blockchain", "UI/UX Design", "Open Source", "Tech Writing", "Problem Solving"].map(tag => (
                    <span key={tag} className="px-3 py-1 rounded-full text-xs font-medium"
                      style={{ background: C.maroonPale, color: C.maroon, border: `1px solid ${C.maroonBorder}`, fontFamily: "Inter, sans-serif" }}>
                      {tag}
                    </span>
                  ))}
                </div>
              </GlassCard>
            </FadeIn>
          </div>
        </div>
      </div>
    </section>
  );
}

// ─── skills ───────────────────────────────────────────────────────────────────

function SkillsSection() {
  const { ref, visible } = useInView();
  const [activeTab, setActiveTab] = useState("Programming Languages");
  const tabs = Object.keys(SKILLS);
  return (
    <section id="skills" ref={ref as React.Ref<HTMLElement>} className="py-24" style={{ background: C.bg }}>
      <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <FadeIn visible={visible}>
          <SectionTitle label="Skills" title="Technical Expertise"
            subtitle="A broad skillset spanning backend, frontend, databases, and dev tools — built through real projects and continuous learning." />
        </FadeIn>
        <FadeIn visible={visible} delay={100}>
          <div className="flex flex-wrap justify-center gap-2 mb-10">
            {tabs.map(tab => (
              <button key={tab} onClick={() => setActiveTab(tab)}
                className="px-4 py-2 rounded-xl text-sm font-medium transition-all duration-200"
                style={{
                  fontFamily: "Inter, sans-serif",
                  background: activeTab === tab ? C.gradMain : C.bgMuted,
                  color: activeTab === tab ? C.white : C.textMuted,
                  border: activeTab === tab ? "1px solid transparent" : `1px solid ${C.maroonBorder}`,
                  boxShadow: activeTab === tab ? C.glowMaroon : "none",
                }}>
                {tab}
              </button>
            ))}
          </div>
        </FadeIn>
        <FadeIn visible={visible} delay={200}>
          <div className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
            {SKILLS[activeTab as keyof typeof SKILLS].map(({ name, icon, level }) => (
              <GlassCard key={name} className="p-5 hover:scale-[1.02] transition-transform duration-200 cursor-default">
                <div className="flex items-center gap-3 mb-3">
                  <span className="text-2xl">{icon}</span>
                  <div className="flex-1">
                    <div className="flex items-center justify-between">
                      <p className="font-semibold text-sm" style={{ fontFamily: "Inter, sans-serif", color: C.text }}>{name}</p>
                      <span className="text-xs font-mono font-semibold" style={{ color: C.maroon }}>{level}%</span>
                    </div>
                  </div>
                </div>
                <div className="h-1.5 rounded-full overflow-hidden" style={{ background: "rgba(128,0,32,0.08)" }}>
                  <div className="h-full rounded-full transition-all duration-700"
                    style={{ width: visible ? `${level}%` : "0%", background: C.gradMain }} />
                </div>
              </GlassCard>
            ))}
          </div>
        </FadeIn>
      </div>
    </section>
  );
}

// ─── portfolio ────────────────────────────────────────────────────────────────

function PortfolioSection() {
  const { ref, visible } = useInView();
  const [filter, setFilter] = useState("All");
  const filters = ["All", "Laravel", "Python", "UI/UX", "API"];
  const filtered = filter === "All" ? PROJECTS : PROJECTS.filter(p => p.tech.some(t => t.toLowerCase().includes(filter.toLowerCase())));

  return (
    <section id="portfolio" ref={ref as React.Ref<HTMLElement>} className="py-24" style={{ background: C.bgSoft }}>
      <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <FadeIn visible={visible}>
          <SectionTitle label="Portfolio" title="Featured Projects"
            subtitle="A selection of projects I&apos;ve built — from management systems to automation bots and e-commerce platforms." />
        </FadeIn>
        <FadeIn visible={visible} delay={100}>
          <div className="flex flex-wrap justify-center gap-2 mb-10">
            {filters.map(f => (
              <button key={f} onClick={() => setFilter(f)}
                className="px-4 py-2 rounded-xl text-sm font-medium transition-all duration-200"
                style={{
                  fontFamily: "Inter, sans-serif",
                  background: filter === f ? C.gradMain : C.bgMuted,
                  color: filter === f ? C.white : C.textMuted,
                  border: filter === f ? "1px solid transparent" : `1px solid ${C.maroonBorder}`,
                }}>
                {f}
              </button>
            ))}
          </div>
        </FadeIn>
        <div className="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
          {filtered.map((project, i) => (
            <FadeIn key={project.name} visible={visible} delay={120 + i * 60}>
              <GlassCard className="overflow-hidden group hover:scale-[1.02] transition-all duration-300 flex flex-col h-full"
                style={{ boxShadow: "0 2px 20px rgba(128,0,32,0.07)" }}>
                <div className="relative overflow-hidden h-44 bg-stone-100">
                  <img src={project.image} alt={project.name}
                    className="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" />
                  <div className="absolute inset-0"
                    style={{ background: "linear-gradient(to bottom,transparent 30%,rgba(255,255,255,0.95))" }} />
                  {project.featured && (
                    <span className="absolute top-3 left-3 px-2 py-0.5 rounded text-xs font-semibold text-white"
                      style={{ background: C.gradMain, fontFamily: "Inter, sans-serif" }}>
                      Featured
                    </span>
                  )}
                </div>
                <div className="p-5 flex flex-col flex-1">
                  <h3 className="font-bold text-base mb-2" style={{ fontFamily: "Poppins, sans-serif", color: C.text }}>{project.name}</h3>
                  <p className="text-sm leading-relaxed mb-4 flex-1" style={{ color: C.textMuted, fontFamily: "Inter, sans-serif" }}>{project.description}</p>
                  <div className="flex flex-wrap gap-1.5 mb-4">
                    {project.tech.map(t => (
                      <span key={t} className="px-2 py-0.5 rounded text-xs font-medium"
                        style={{ background: C.maroonPale, color: C.maroon, border: `1px solid ${C.maroonBorder}`, fontFamily: "Inter, sans-serif" }}>
                        {t}
                      </span>
                    ))}
                  </div>
                  <div className="flex gap-3">
                    <a href={project.github}
                      className="flex-1 flex items-center justify-center gap-1.5 py-2 rounded-lg text-xs font-semibold transition-all duration-200 hover:opacity-80"
                      style={{ border: `1px solid ${C.maroonBorder}`, color: C.textMuted, fontFamily: "Inter, sans-serif" }}>
                      <Github className="w-3.5 h-3.5" /> GitHub
                    </a>
                    <a href={project.demo}
                      className="flex-1 flex items-center justify-center gap-1.5 py-2 rounded-lg text-xs font-semibold text-white transition-all duration-200 hover:opacity-80"
                      style={{ background: C.gradMain, fontFamily: "Inter, sans-serif" }}>
                      <ExternalLink className="w-3.5 h-3.5" /> Live Demo
                    </a>
                  </div>
                </div>
              </GlassCard>
            </FadeIn>
          ))}
        </div>
      </div>
    </section>
  );
}

// ─── experience ───────────────────────────────────────────────────────────────

function ExperienceSection() {
  const { ref, visible } = useInView();
  return (
    <section id="experience" ref={ref as React.Ref<HTMLElement>} className="py-24" style={{ background: C.bg }}>
      <div className="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <FadeIn visible={visible}>
          <SectionTitle label="Experience" title="Work Experience"
            subtitle="My professional journey in web development, design, and academic projects." />
        </FadeIn>
        <div className="relative">
          <div className="absolute left-5 top-0 bottom-0 w-px"
            style={{ background: `linear-gradient(to bottom,${C.maroon},${C.maroonLight},transparent)` }} />
          {EXPERIENCES.map((exp, i) => (
            <FadeIn key={exp.role} visible={visible} delay={100 + i * 100}>
              <div className="relative flex gap-8 mb-10 pl-16">
                <div className="absolute left-0 w-10 h-10 rounded-full flex items-center justify-center border-4"
                  style={{ background: exp.color, borderColor: C.bg, top: "4px" }}>
                  <Briefcase className="w-4 h-4 text-white" />
                </div>
                <GlassCard className="flex-1 p-6 hover:scale-[1.01] transition-transform duration-200">
                  <div className="flex flex-wrap items-start justify-between gap-3 mb-3">
                    <div>
                      <h3 className="font-bold text-base" style={{ fontFamily: "Poppins, sans-serif", color: C.text }}>{exp.role}</h3>
                      <p className="text-sm" style={{ color: C.maroon, fontFamily: "Inter, sans-serif" }}>{exp.company}</p>
                    </div>
                    <div className="text-right">
                      <span className="inline-block px-2 py-0.5 rounded text-xs font-medium mb-1"
                        style={{ background: C.maroonPale, color: C.textMuted, fontFamily: "Inter, sans-serif" }}>
                        {exp.type}
                      </span>
                      <p className="text-xs" style={{ color: C.textFaint, fontFamily: "Inter, sans-serif" }}>{exp.period}</p>
                    </div>
                  </div>
                  <p className="text-sm leading-relaxed mb-4" style={{ color: C.textMuted, fontFamily: "Inter, sans-serif" }}>{exp.description}</p>
                  <div className="flex flex-wrap gap-1.5">
                    {exp.skills.map(s => (
                      <span key={s} className="px-2 py-0.5 rounded text-xs"
                        style={{ background: C.bgMuted, color: C.textMuted, border: `1px solid ${C.maroonBorder}`, fontFamily: "Inter, sans-serif" }}>
                        {s}
                      </span>
                    ))}
                  </div>
                </GlassCard>
              </div>
            </FadeIn>
          ))}
        </div>
      </div>
    </section>
  );
}

// ─── certificates ─────────────────────────────────────────────────────────────

function CertificatesSection() {
  const { ref, visible } = useInView();
  return (
    <section id="certificates" ref={ref as React.Ref<HTMLElement>} className="py-24" style={{ background: C.bgSoft }}>
      <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <FadeIn visible={visible}>
          <SectionTitle label="Certificates" title="Certifications"
            subtitle="Professional certifications and courses that have shaped my technical knowledge." />
        </FadeIn>
        <div className="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
          {CERTIFICATES.map((cert, i) => (
            <FadeIn key={cert.name} visible={visible} delay={80 * i}>
              <GlassCard className="overflow-hidden group hover:scale-[1.03] transition-all duration-300">
                <div className="relative h-36 overflow-hidden bg-stone-100">
                  <img src={cert.image} alt={cert.name}
                    className="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110 opacity-80" />
                  <div className="absolute inset-0" style={{ background: `linear-gradient(135deg,${cert.color}33,transparent)` }} />
                  <div className="absolute top-3 right-3">
                    <Award className="w-5 h-5" style={{ color: cert.color }} />
                  </div>
                </div>
                <div className="p-5">
                  <p className="text-xs font-semibold mb-1" style={{ color: cert.color, fontFamily: "Inter, sans-serif" }}>{cert.issuer} · {cert.date}</p>
                  <h3 className="font-bold text-sm leading-snug mb-4" style={{ fontFamily: "Poppins, sans-serif", color: C.text }}>{cert.name}</h3>
                  <button className="w-full flex items-center justify-center gap-2 py-2 rounded-lg text-xs font-semibold transition-all duration-200 hover:opacity-80"
                    style={{ border: `1px solid ${C.maroonBorder}`, color: C.maroon, fontFamily: "Inter, sans-serif" }}>
                    <Eye className="w-3.5 h-3.5" /> View Certificate
                  </button>
                </div>
              </GlassCard>
            </FadeIn>
          ))}
        </div>
      </div>
    </section>
  );
}

// ─── education ────────────────────────────────────────────────────────────────

function EducationSection() {
  const { ref, visible } = useInView();
  return (
    <section id="education" ref={ref as React.Ref<HTMLElement>} className="py-24" style={{ background: C.bg }}>
      <div className="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <FadeIn visible={visible}>
          <SectionTitle label="Education" title="Academic Journey"
            subtitle="My educational path from elementary school to university." />
        </FadeIn>
        <div className="relative">
          <div className="absolute left-5 top-0 bottom-0 w-px"
            style={{ background: `linear-gradient(to bottom,${C.maroonLight},${C.maroon},transparent)` }} />
          {EDUCATION.map((edu, i) => (
            <FadeIn key={edu.level} visible={visible} delay={100 * i}>
              <div className="relative flex gap-8 mb-8 pl-16">
                <div className="absolute left-0 w-10 h-10 rounded-full flex items-center justify-center border-4 text-lg"
                  style={{
                    background: edu.current ? C.gradMain : C.bgMuted,
                    borderColor: C.bg,
                    top: "4px",
                    boxShadow: edu.current ? C.glowMaroon : "none",
                  }}>
                  {edu.icon}
                </div>
                <GlassCard className="flex-1 p-6" ring={edu.current}>
                  <div className="flex flex-wrap items-start justify-between gap-2 mb-2">
                    <div>
                      <h3 className="font-bold text-base" style={{ fontFamily: "Poppins, sans-serif", color: C.text }}>{edu.level}</h3>
                      <p className="text-sm" style={{ color: C.maroon, fontFamily: "Inter, sans-serif" }}>{edu.field}</p>
                    </div>
                    <div className="text-right">
                      {edu.current && (
                        <span className="inline-block px-2 py-0.5 rounded-full text-xs font-semibold mb-1"
                          style={{ background: C.maroonPale, color: C.maroon, border: `1px solid ${C.maroonBorderStrong}`, fontFamily: "Inter, sans-serif" }}>
                          ● Current
                        </span>
                      )}
                      <p className="text-xs" style={{ color: C.textFaint, fontFamily: "Inter, sans-serif" }}>{edu.period}</p>
                    </div>
                  </div>
                  {edu.gpa && (
                    <p className="text-xs mt-2" style={{ color: C.textMuted, fontFamily: "Inter, sans-serif" }}>
                      GPA: <span style={{ color: "#16A34A", fontWeight: 600 }}>{edu.gpa}</span>
                    </p>
                  )}
                </GlassCard>
              </div>
            </FadeIn>
          ))}
        </div>
      </div>
    </section>
  );
}

// ─── achievements ─────────────────────────────────────────────────────────────

function AchievementsSection() {
  const { ref, visible } = useInView();
  return (
    <section id="achievements" ref={ref as React.Ref<HTMLElement>} className="py-24" style={{ background: C.bgSoft }}>
      <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <FadeIn visible={visible}>
          <SectionTitle label="Achievements" title="Awards & Recognition"
            subtitle="Milestones that mark my growth as a student and developer." />
        </FadeIn>
        <div className="grid sm:grid-cols-2 lg:grid-cols-3 gap-5">
          {ACHIEVEMENTS.map((item, i) => (
            <FadeIn key={item.title} visible={visible} delay={70 * i}>
              <GlassCard className="p-6 hover:scale-[1.02] transition-all duration-300">
                <div className="flex items-start gap-4">
                  <div className="w-12 h-12 rounded-xl flex items-center justify-center text-2xl flex-shrink-0"
                    style={{ background: `${item.color}12`, border: `1px solid ${item.color}30` }}>
                    {item.icon}
                  </div>
                  <div className="flex-1 min-w-0">
                    <span className="text-xs font-semibold px-2 py-0.5 rounded-full mb-2 inline-block"
                      style={{ background: `${item.color}12`, color: item.color, fontFamily: "Inter, sans-serif" }}>
                      {item.category}
                    </span>
                    <h3 className="font-bold text-sm leading-snug mb-1" style={{ fontFamily: "Poppins, sans-serif", color: C.text }}>{item.title}</h3>
                    <p className="text-xs" style={{ color: C.textFaint, fontFamily: "Inter, sans-serif" }}>{item.org}</p>
                    <p className="text-xs mt-1 font-semibold font-mono" style={{ color: item.color }}>{item.year}</p>
                  </div>
                </div>
              </GlassCard>
            </FadeIn>
          ))}
        </div>
      </div>
    </section>
  );
}

// ─── blog ─────────────────────────────────────────────────────────────────────

function BlogSection() {
  const { ref, visible } = useInView();
  return (
    <section id="blog" ref={ref as React.Ref<HTMLElement>} className="py-24" style={{ background: C.bg }}>
      <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <FadeIn visible={visible}>
          <SectionTitle label="Blog" title="Latest Articles"
            subtitle="Thoughts, tutorials, and insights from my journey in software engineering." />
        </FadeIn>
        <div className="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
          {BLOG_POSTS.map((post, i) => (
            <FadeIn key={post.title} visible={visible} delay={80 * i}>
              <GlassCard className="overflow-hidden group flex flex-col h-full hover:scale-[1.02] transition-all duration-300">
                <div className="relative h-40 overflow-hidden bg-stone-100">
                  <img src={post.image} alt={post.title}
                    className="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110 opacity-90" />
                  <div className="absolute inset-0"
                    style={{ background: "linear-gradient(to bottom,transparent 40%,rgba(255,255,255,0.9))" }} />
                  <span className="absolute top-3 left-3 px-2 py-0.5 rounded text-xs font-semibold text-white"
                    style={{ background: post.color, fontFamily: "Inter, sans-serif" }}>
                    {post.category}
                  </span>
                </div>
                <div className="p-5 flex flex-col flex-1">
                  <div className="flex items-center gap-3 mb-3 text-xs" style={{ color: C.textFaint, fontFamily: "Inter, sans-serif" }}>
                    <span className="flex items-center gap-1"><Calendar className="w-3 h-3" />{post.date}</span>
                    <span className="flex items-center gap-1"><Clock className="w-3 h-3" />{post.readTime}</span>
                  </div>
                  <h3 className="font-bold text-sm leading-snug mb-3 flex-1" style={{ fontFamily: "Poppins, sans-serif", color: C.text }}>{post.title}</h3>
                  <p className="text-xs leading-relaxed mb-4" style={{ color: C.textFaint, fontFamily: "Inter, sans-serif" }}>{post.excerpt}</p>
                  <a href="#" className="flex items-center gap-1.5 text-xs font-semibold transition-all hover:gap-2.5"
                    style={{ color: C.maroon, fontFamily: "Inter, sans-serif" }}>
                    Read More <ChevronRight className="w-3.5 h-3.5" />
                  </a>
                </div>
              </GlassCard>
            </FadeIn>
          ))}
        </div>
      </div>
    </section>
  );
}

// ─── contact ──────────────────────────────────────────────────────────────────

function ContactSection() {
  const { ref, visible } = useInView();
  const [form, setForm] = useState({ name: "", email: "", subject: "", message: "" });
  const [sent, setSent] = useState(false);

  function handleSubmit(e: React.FormEvent) {
    e.preventDefault();
    setSent(true);
    setTimeout(() => setSent(false), 4000);
    setForm({ name: "", email: "", subject: "", message: "" });
  }

  const contacts = [
    { icon: Mail, label: "Email", value: "fadhil@example.com", href: "mailto:fadhil@example.com" },
    { icon: Phone, label: "Phone", value: "+62 812 3456 7890", href: "tel:+6281234567890" },
    { icon: MapPin, label: "Location", value: "Tasikmalaya, Indonesia", href: "#" },
    { icon: Github, label: "GitHub", value: "github.com/fadhilafiq", href: "#" },
    { icon: Linkedin, label: "LinkedIn", value: "linkedin.com/in/fadhilafiq", href: "#" },
    { icon: Instagram, label: "Instagram", value: "@fadhilafiq_", href: "#" },
  ];

  const inputStyle: React.CSSProperties = {
    background: C.bgMuted,
    border: `1px solid ${C.maroonBorder}`,
    color: C.text,
    borderRadius: "0.75rem",
    fontFamily: "Inter, sans-serif",
    fontSize: "0.875rem",
    outline: "none",
    width: "100%",
    padding: "0.75rem 1rem",
    transition: "border-color 0.2s",
  };

  return (
    <section id="contact" ref={ref as React.Ref<HTMLElement>} className="py-24" style={{ background: C.bgSoft }}>
      <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <FadeIn visible={visible}>
          <SectionTitle label="Contact" title="Get In Touch"
            subtitle="Have a project in mind or just want to say hello? I&apos;d love to hear from you." />
        </FadeIn>
        <div className="grid lg:grid-cols-5 gap-10 items-start">
          <div className="lg:col-span-2 flex flex-col gap-4">
            {contacts.map(({ icon: Icon, label, value, href }, i) => (
              <FadeIn key={label} visible={visible} delay={80 * i}>
                <GlassCard className="p-4 hover:scale-[1.02] transition-transform duration-200">
                  <a href={href} className="flex items-center gap-4">
                    <div className="w-10 h-10 rounded-xl flex items-center justify-center flex-shrink-0"
                      style={{ background: C.maroonPale, border: `1px solid ${C.maroonBorder}` }}>
                      <Icon className="w-4 h-4" style={{ color: C.maroon }} />
                    </div>
                    <div>
                      <p className="text-xs font-semibold mb-0.5" style={{ color: C.textMuted, fontFamily: "Inter, sans-serif" }}>{label}</p>
                      <p className="text-sm" style={{ color: C.text, fontFamily: "Inter, sans-serif" }}>{value}</p>
                    </div>
                  </a>
                </GlassCard>
              </FadeIn>
            ))}
          </div>
          <FadeIn visible={visible} delay={200}>
            <GlassCard className="lg:col-span-3 p-8">
              <h3 className="text-xl font-bold mb-6" style={{ fontFamily: "Poppins, sans-serif", color: C.text }}>Send a Message</h3>
              {sent && (
                <div className="mb-5 px-4 py-3 rounded-xl text-sm font-medium"
                  style={{ background: "rgba(22,163,74,0.08)", border: "1px solid rgba(22,163,74,0.3)", color: "#16A34A", fontFamily: "Inter, sans-serif" }}>
                  ✓ Message sent! I&apos;ll get back to you soon.
                </div>
              )}
              <form onSubmit={handleSubmit} className="flex flex-col gap-4">
                <div className="grid sm:grid-cols-2 gap-4">
                  <input value={form.name} onChange={e => setForm(f => ({ ...f, name: e.target.value }))}
                    placeholder="Your Name" required style={inputStyle} />
                  <input type="email" value={form.email} onChange={e => setForm(f => ({ ...f, email: e.target.value }))}
                    placeholder="Your Email" required style={inputStyle} />
                </div>
                <input value={form.subject} onChange={e => setForm(f => ({ ...f, subject: e.target.value }))}
                  placeholder="Subject" required style={inputStyle} />
                <textarea value={form.message} onChange={e => setForm(f => ({ ...f, message: e.target.value }))}
                  placeholder="Your Message" rows={5} required
                  style={{ ...inputStyle, resize: "vertical" }} />
                <button type="submit"
                  className="flex items-center justify-center gap-2 py-3 px-6 rounded-xl text-sm font-semibold text-white transition-all duration-200 hover:scale-[1.02]"
                  style={{ background: C.gradMain, boxShadow: C.glowMaroon, fontFamily: "Inter, sans-serif" }}>
                  <Send className="w-4 h-4" /> Send Message
                </button>
              </form>
            </GlassCard>
          </FadeIn>
        </div>
      </div>
    </section>
  );
}

// ─── footer ───────────────────────────────────────────────────────────────────

function Footer() {
  return (
    <footer className="pt-12 pb-8" style={{ borderTop: `1px solid ${C.maroonBorder}`, background: C.bg }}>
      <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div className="grid md:grid-cols-3 gap-10 mb-10">
          <div>
            <p className="font-bold text-2xl mb-3"
              style={{ fontFamily: "Poppins, sans-serif", background: C.gradMain, WebkitBackgroundClip: "text", WebkitTextFillColor: "transparent" }}>
              FAB.
            </p>
            <p className="text-sm leading-relaxed" style={{ color: C.textMuted, fontFamily: "Inter, sans-serif" }}>
              Informatics Engineering Student & Full Stack Web Developer. Building digital experiences that matter.
            </p>
          </div>
          <div>
            <p className="font-semibold text-sm mb-4" style={{ fontFamily: "Poppins, sans-serif", color: C.text }}>Quick Links</p>
            <ul className="flex flex-col gap-2">
              {NAV_LINKS.slice(0, 6).map(({ label, href }) => (
                <li key={href}>
                  <a href={href} className="text-sm transition-colors hover:text-red-800"
                    style={{ color: C.textMuted, fontFamily: "Inter, sans-serif" }}>
                    {label}
                  </a>
                </li>
              ))}
            </ul>
          </div>
          <div>
            <p className="font-semibold text-sm mb-4" style={{ fontFamily: "Poppins, sans-serif", color: C.text }}>Connect</p>
            <div className="flex gap-3 flex-wrap">
              {[
                { icon: Github, href: "#", label: "GitHub" },
                { icon: Linkedin, href: "#", label: "LinkedIn" },
                { icon: Instagram, href: "#", label: "Instagram" },
                { icon: Mail, href: "mailto:fadhil@example.com", label: "Email" },
              ].map(({ icon: Icon, href, label }) => (
                <a key={label} href={href} aria-label={label}
                  className="w-9 h-9 rounded-lg flex items-center justify-center transition-all duration-200 hover:scale-110"
                  style={{ background: C.maroonPale, border: `1px solid ${C.maroonBorder}`, color: C.maroon }}>
                  <Icon className="w-4 h-4" />
                </a>
              ))}
            </div>
          </div>
        </div>
        <div className="flex flex-col sm:flex-row items-center justify-between gap-3 pt-6"
          style={{ borderTop: `1px solid ${C.maroonBorder}` }}>
          <p className="text-xs" style={{ color: C.textFaint, fontFamily: "Inter, sans-serif" }}>
            © 2025 Fadhil Afiq Badruzzaman. All rights reserved.
          </p>
          <p className="text-xs" style={{ color: C.textFaint, fontFamily: "Inter, sans-serif" }}>
            Built with <span style={{ color: C.maroon }}>❤</span> using Laravel & Tailwind CSS
          </p>
        </div>
      </div>
    </footer>
  );
}

// ─── scroll progress + back to top ───────────────────────────────────────────

function ScrollProgress() {
  const [progress, setProgress] = useState(0);
  useEffect(() => {
    const fn = () => {
      const total = document.documentElement.scrollHeight - window.innerHeight;
      setProgress(total > 0 ? (window.scrollY / total) * 100 : 0);
    };
    window.addEventListener("scroll", fn, { passive: true });
    return () => window.removeEventListener("scroll", fn);
  }, []);
  return (
    <div className="fixed top-0 left-0 right-0 z-[60] h-0.5">
      <div className="h-full transition-all duration-100"
        style={{ width: `${progress}%`, background: C.gradMain }} />
    </div>
  );
}

function BackToTop() {
  const [show, setShow] = useState(false);
  useEffect(() => {
    const fn = () => setShow(window.scrollY > 400);
    window.addEventListener("scroll", fn, { passive: true });
    return () => window.removeEventListener("scroll", fn);
  }, []);
  return show ? (
    <button onClick={() => window.scrollTo({ top: 0, behavior: "smooth" })}
      className="fixed bottom-8 right-8 z-50 w-11 h-11 rounded-full flex items-center justify-center transition-all duration-300 hover:scale-110"
      style={{ background: C.gradMain, boxShadow: C.glowMaroon }}>
      <ChevronUp className="w-5 h-5 text-white" />
    </button>
  ) : null;
}

// ─── app ──────────────────────────────────────────────────────────────────────

export default function App() {
  const [menuOpen, setMenuOpen] = useState(false);
  const [activeSection, setActiveSection] = useState("home");

  useEffect(() => {
    const ids = NAV_LINKS.map(l => l.href.slice(1));
    const observers = ids.map(id => {
      const el = document.getElementById(id);
      if (!el) return null;
      const obs = new IntersectionObserver(
        ([entry]) => { if (entry.isIntersecting) setActiveSection(id); },
        { threshold: 0.25 }
      );
      obs.observe(el);
      return obs;
    });
    return () => observers.forEach(o => o?.disconnect());
  }, []);

  useEffect(() => {
    const handler = (e: MouseEvent) => {
      const a = (e.target as HTMLElement).closest("a");
      if (a && a.getAttribute("href")?.startsWith("#")) {
        const id = a.getAttribute("href")!.slice(1);
        const el = document.getElementById(id);
        if (el) { e.preventDefault(); el.scrollIntoView({ behavior: "smooth" }); }
      }
    };
    document.addEventListener("click", handler);
    return () => document.removeEventListener("click", handler);
  }, []);

  return (
    <div className="min-h-screen" style={{ background: C.bg, fontFamily: "Inter, sans-serif" }}>
      <ScrollProgress />
      <Navbar active={activeSection} menuOpen={menuOpen} setMenuOpen={setMenuOpen} />
      <main>
        <HeroSection />
        <AboutSection />
        <SkillsSection />
        <PortfolioSection />
        <ExperienceSection />
        <CertificatesSection />
        <EducationSection />
        <AchievementsSection />
        <BlogSection />
        <ContactSection />
      </main>
      <Footer />
      <BackToTop />
    </div>
  );
}
