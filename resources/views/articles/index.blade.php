<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Articles — Corpus</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Instrument+Serif:ital@0;1&family=Figtree:wght@300;400;500;600&display=swap" rel="stylesheet">
<style>
*, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

:root {
    --bg:           #f2f4f8;
    --bg-soft:      #eaecf3;
    --glass:        rgba(255,255,255,0.72);
    --glass-hover:  rgba(255,255,255,0.88);
    --glass-border: rgba(180,190,220,0.45);
    --glass-border-h:rgba(120,140,200,0.55);
    --navy:         #2d3a5e;
    --slate:        #4a5880;
    --muted:        #8d98b8;
    --periwinkle:   #6478d4;
    --periwinkle-g: rgba(100,120,212,0.12);
    --rose:         #c8708a;
    --sage:         #5a9e82;
    --danger:       #c0505a;
    --shadow-sm:    0 2px 12px rgba(60,80,140,0.07);
    --shadow-md:    0 8px 32px rgba(60,80,140,0.10);
    --shadow-lg:    0 16px 48px rgba(60,80,140,0.13);
    --radius:       18px;
    --radius-sm:    11px;
}

body {
    font-family: 'Figtree', sans-serif;
    background: var(--bg);
    color: var(--navy);
    min-height: 100vh;
}

/* Mesh background */
body::before {
    content: '';
    position: fixed; inset: 0; z-index: 0;
    background:
        radial-gradient(ellipse 70% 50% at 10% 20%, rgba(100,120,212,0.09) 0%, transparent 60%),
        radial-gradient(ellipse 60% 50% at 85% 75%, rgba(200,112,138,0.07) 0%, transparent 60%),
        radial-gradient(ellipse 50% 40% at 50% 100%, rgba(90,158,130,0.06) 0%, transparent 60%);
    pointer-events: none;
}

/* ── Navbar ── */
nav {
    position: fixed; top: 0; left: 0; right: 0; z-index: 100;
    height: 62px;
    background: rgba(242,244,248,0.82);
    backdrop-filter: blur(24px) saturate(180%);
    border-bottom: 1px solid var(--glass-border);
    display: flex; align-items: center; justify-content: space-between;
    padding: 0 40px;
    box-shadow: 0 1px 0 rgba(255,255,255,0.9);
}
.nav-brand {
    font-family: 'Instrument Serif', serif;
    font-size: 1.25rem; color: var(--navy);
    text-decoration: none;
    display: flex; align-items: center; gap: 10px;
}
.nav-brand::before {
    content: '';
    width: 28px; height: 28px;
    background: linear-gradient(135deg, var(--periwinkle) 0%, var(--rose) 100%);
    border-radius: 8px;
    display: inline-block;
    box-shadow: 0 4px 12px rgba(100,120,212,0.3);
}
.nav-links { display: flex; gap: 4px; }
.nav-links a {
    font-size: 0.83rem; font-weight: 500;
    color: var(--slate);
    text-decoration: none;
    padding: 6px 14px; border-radius: 8px;
    border: 1px solid transparent;
    transition: all .2s;
}
.nav-links a:hover { background: var(--glass); border-color: var(--glass-border); color: var(--navy); }
.nav-links a.active { background: var(--periwinkle-g); border-color: rgba(100,120,212,0.25); color: var(--periwinkle); }

/* ── Page wrapper ── */
.wrap {
    position: relative; z-index: 1;
    max-width: 980px; margin: 0 auto;
    padding: 96px 24px 64px;
}

/* ── Page header ── */
.page-head {
    display: flex; justify-content: space-between; align-items: flex-end;
    margin-bottom: 36px;
    animation: fadeUp .5s ease forwards; opacity: 0; transform: translateY(14px);
}
.page-head-text h1 {
    font-family: 'Instrument Serif', serif;
    font-size: 2.2rem; font-weight: 400;
    color: var(--navy); line-height: 1.15;
}
.page-head-text p { font-size: 0.875rem; color: var(--muted); margin-top: 4px; }

/* ── Alert ── */
.alert {
    display: flex; align-items: center; gap: 10px;
    padding: 12px 18px;
    background: rgba(90,158,130,0.10);
    border: 1px solid rgba(90,158,130,0.25);
    border-radius: var(--radius-sm);
    color: var(--sage);
    font-size: 0.875rem; font-weight: 500;
    margin-bottom: 28px;
    animation: fadeUp .3s ease forwards; opacity: 0;
}
.alert::before { content: '✓'; font-weight: 700; }

/* ── Articles grid ── */
.articles-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(420px, 1fr));
    gap: 20px;
}

/* ── Article card ── */
.article-card {
    background: var(--glass);
    border: 1px solid var(--glass-border);
    border-radius: var(--radius);
    backdrop-filter: blur(20px) saturate(160%);
    box-shadow: var(--shadow-md);
    overflow: hidden;
    transition: transform .25s, box-shadow .25s, border-color .25s;
    animation: fadeUp .5s ease forwards; opacity: 0; transform: translateY(14px);
}
.article-card:hover {
    transform: translateY(-3px);
    box-shadow: var(--shadow-lg);
    border-color: var(--glass-border-h);
}
.article-card:nth-child(1) { animation-delay: .05s; }
.article-card:nth-child(2) { animation-delay: .10s; }
.article-card:nth-child(3) { animation-delay: .15s; }
.article-card:nth-child(4) { animation-delay: .20s; }

.card-image {
    width: 100%; height: 200px;
    object-fit: cover;
    display: block;
    border-bottom: 1px solid var(--glass-border);
}

.card-body { padding: 22px 24px; }

.card-meta {
    display: flex; align-items: center; gap: 8px;
    margin-bottom: 10px;
}
.badge {
    display: inline-block;
    padding: 3px 10px;
    border-radius: 20px;
    font-size: 0.73rem; font-weight: 600;
    letter-spacing: 0.04em;
    background: var(--periwinkle-g);
    border: 1px solid rgba(100,120,212,0.2);
    color: var(--periwinkle);
}
.card-date { font-size: 0.78rem; color: var(--muted); }

.card-title {
    font-family: 'Instrument Serif', serif;
    font-size: 1.25rem; font-weight: 400;
    color: var(--navy);
    line-height: 1.3;
    margin-bottom: 8px;
}
.card-excerpt {
    font-size: 0.85rem; color: var(--slate);
    line-height: 1.65;
    display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical;
    overflow: hidden;
}

.card-footer {
    display: flex; justify-content: space-between; align-items: center;
    padding: 14px 24px;
    border-top: 1px solid rgba(180,190,220,0.3);
    background: rgba(255,255,255,0.4);
}
.card-author { font-size: 0.8rem; color: var(--muted); }
.card-author strong { color: var(--slate); }

.card-actions { display: flex; gap: 8px; }

/* ── Buttons ── */
.btn {
    display: inline-flex; align-items: center; gap: 6px;
    font-family: 'Figtree', sans-serif;
    font-size: 0.83rem; font-weight: 500;
    padding: 8px 18px; border-radius: var(--radius-sm);
    border: 1px solid transparent;
    cursor: pointer; text-decoration: none;
    transition: all .2s;
}
.btn-primary {
    background: var(--periwinkle);
    color: #fff;
    box-shadow: 0 4px 14px rgba(100,120,212,0.3);
}
.btn-primary:hover { background: #7389e0; box-shadow: 0 6px 20px rgba(100,120,212,0.4); transform: translateY(-1px); }
.btn-ghost {
    background: rgba(255,255,255,0.6);
    border-color: var(--glass-border);
    color: var(--slate);
}
.btn-ghost:hover { background: rgba(255,255,255,0.9); color: var(--navy); }
.btn-danger-ghost {
    background: rgba(192,80,90,0.07);
    border-color: rgba(192,80,90,0.2);
    color: var(--danger);
}
.btn-danger-ghost:hover { background: rgba(192,80,90,0.14); }
.btn-sm { padding: 5px 12px; font-size: 0.78rem; }

/* ── Empty state ── */
.empty-state {
    text-align: center; padding: 80px 20px;
    background: var(--glass);
    border: 1px dashed var(--glass-border);
    border-radius: var(--radius);
    backdrop-filter: blur(12px);
}
.empty-state .icon { font-size: 3rem; margin-bottom: 16px; opacity: .5; }
.empty-state h2 { font-family: 'Instrument Serif', serif; font-size: 1.5rem; color: var(--navy); margin-bottom: 8px; }
.empty-state p { color: var(--muted); font-size: 0.875rem; }

@keyframes fadeUp {
    to { opacity: 1; transform: translateY(0); }
}
</style>
</head>
<body>

<nav>
    <a href="#" class="nav-brand">Corpus</a>
    <div class="nav-links">
        <a href="{{ route('articles.index') }}" class="active">Articles</a>
        <a href="{{ route('types.index') }}">Types</a>
    </div>
</nav>

<div class="wrap">

    @if(session('success'))
        <div class="alert">{{ session('success') }}</div>
    @endif

    <div class="page-head">
        <div class="page-head-text">
            <h1>Articles</h1>
            <p>{{ $articles->count() }} publication{{ $articles->count() > 1 ? 's' : '' }} au total</p>
        </div>
        <a href="{{ route('articles.create') }}" class="btn btn-primary">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
            Nouvel article
        </a>
    </div>

    @if($articles->isEmpty())
        <div class="empty-state">
            <div class="icon">📄</div>
            <h2>Aucun article pour l'instant</h2>
            <p>Commencez par créer votre premier article.</p>
        </div>
    @else
        <div class="articles-grid">
            @foreach($articles as $article)
            <div class="article-card">
                @if($article->image)
                    <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }}" class="card-image">
                @endif
                <div class="card-body">
                    <div class="card-meta">
                        <span class="badge">{{ $article->type->name }}</span>
                        <span class="card-date">{{ $article->created_at->format('d M Y') }}</span>
                    </div>
                    <h2 class="card-title">
                        <a href="{{ route('articles.show', $article) }}" style="text-decoration:none;color:inherit">
                            {{ $article->title }}
                        </a>
                    </h2>
                    <p class="card-excerpt">{{ $article->content }}</p>
                </div>
                <div class="card-footer">
                    <span class="card-author">Par <strong>{{ $article->user->name }}</strong></span>
                    <div class="card-actions">
                        <a href="{{ route('articles.show', $article) }}" class="btn btn-ghost btn-sm">Voir</a>
                        <a href="{{ route('articles.edit', $article) }}" class="btn btn-ghost btn-sm">Éditer</a>
                        <form action="{{ route('articles.destroy', $article) }}" method="POST" style="display:inline">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-danger-ghost btn-sm"
                                onclick="return confirm('Supprimer cet article ?')">Supprimer</button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    @endif

</div>
</body>
</html>