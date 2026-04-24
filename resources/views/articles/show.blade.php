<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>{{ $article->title }} — Corpus</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Instrument+Serif:ital@0;1&family=Figtree:wght@300;400;500;600&display=swap" rel="stylesheet">
<style>
*, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
:root {
    --bg:           #f2f4f8;
    --glass:        rgba(255,255,255,0.72);
    --glass-border: rgba(180,190,220,0.45);
    --navy:         #2d3a5e;
    --slate:        #4a5880;
    --muted:        #8d98b8;
    --periwinkle:   #6478d4;
    --periwinkle-g: rgba(100,120,212,0.10);
    --rose:         #c8708a;
    --danger:       #c0505a;
    --shadow-md:    0 8px 32px rgba(60,80,140,0.10);
    --radius:       18px;
    --radius-sm:    11px;
}
body { font-family: 'Figtree', sans-serif; background: var(--bg); color: var(--navy); min-height: 100vh; }
body::before {
    content: ''; position: fixed; inset: 0; z-index: 0; pointer-events: none;
    background:
        radial-gradient(ellipse 70% 50% at 10% 20%, rgba(100,120,212,0.09) 0%, transparent 60%),
        radial-gradient(ellipse 60% 50% at 85% 75%, rgba(200,112,138,0.07) 0%, transparent 60%);
}
nav {
    position: fixed; top: 0; left: 0; right: 0; z-index: 100; height: 62px;
    background: rgba(242,244,248,0.82); backdrop-filter: blur(24px) saturate(180%);
    border-bottom: 1px solid var(--glass-border);
    display: flex; align-items: center; justify-content: space-between;
    padding: 0 40px; box-shadow: 0 1px 0 rgba(255,255,255,0.9);
}
.nav-brand {
    font-family: 'Instrument Serif', serif; font-size: 1.25rem; color: var(--navy);
    text-decoration: none; display: flex; align-items: center; gap: 10px;
}
.nav-brand::before {
    content: ''; width: 28px; height: 28px;
    background: linear-gradient(135deg, var(--periwinkle) 0%, var(--rose) 100%);
    border-radius: 8px; display: inline-block; box-shadow: 0 4px 12px rgba(100,120,212,0.3);
}
.nav-links { display: flex; gap: 4px; }
.nav-links a {
    font-size: 0.83rem; font-weight: 500; color: var(--slate); text-decoration: none;
    padding: 6px 14px; border-radius: 8px; border: 1px solid transparent; transition: all .2s;
}
.nav-links a:hover { background: var(--glass); border-color: var(--glass-border); color: var(--navy); }
.nav-links a.active { background: var(--periwinkle-g); border-color: rgba(100,120,212,0.25); color: var(--periwinkle); }

.wrap { position: relative; z-index: 1; max-width: 760px; margin: 0 auto; padding: 96px 24px 64px; }

.breadcrumb {
    display: flex; align-items: center; gap: 8px;
    font-size: 0.8rem; color: var(--muted); margin-bottom: 32px;
    animation: fadeUp .4s ease forwards; opacity: 0;
}
.breadcrumb a { color: var(--muted); text-decoration: none; transition: color .2s; }
.breadcrumb a:hover { color: var(--periwinkle); }
.breadcrumb span { color: var(--navy); font-weight: 500; }

/* Article header */
.article-header {
    margin-bottom: 32px;
    animation: fadeUp .45s ease .05s forwards; opacity: 0; transform: translateY(14px);
}
.article-meta {
    display: flex; align-items: center; gap: 12px; flex-wrap: wrap;
    margin-bottom: 16px;
}
.badge {
    display: inline-block; padding: 4px 12px; border-radius: 20px;
    font-size: 0.74rem; font-weight: 600; letter-spacing: .04em;
    background: var(--periwinkle-g); border: 1px solid rgba(100,120,212,0.2);
    color: var(--periwinkle);
}
.meta-sep { width: 4px; height: 4px; background: var(--muted); border-radius: 50%; }
.article-date { font-size: 0.8rem; color: var(--muted); }
.article-author { font-size: 0.8rem; color: var(--muted); }
.article-author strong { color: var(--slate); }

.article-title {
    font-family: 'Instrument Serif', serif;
    font-size: 2.6rem; font-weight: 400; line-height: 1.15;
    color: var(--navy); letter-spacing: -0.02em;
}

/* Cover image */
.article-cover {
    width: 100%; max-height: 400px; object-fit: cover;
    border-radius: var(--radius); margin-bottom: 32px;
    border: 1px solid var(--glass-border);
    box-shadow: var(--shadow-md);
    animation: fadeUp .5s ease .1s forwards; opacity: 0; transform: translateY(14px);
}

/* Article body card */
.article-body {
    background: var(--glass); border: 1px solid var(--glass-border);
    border-radius: var(--radius); backdrop-filter: blur(20px) saturate(160%);
    box-shadow: var(--shadow-md); padding: 40px;
    animation: fadeUp .5s ease .15s forwards; opacity: 0; transform: translateY(14px);
}
.article-body p {
    font-size: 1rem; line-height: 1.8; color: var(--slate);
    white-space: pre-wrap;
}

/* Actions bar */
.article-actions {
    display: flex; justify-content: space-between; align-items: center;
    margin-top: 28px;
    animation: fadeUp .5s ease .2s forwards; opacity: 0; transform: translateY(12px);
}
.action-group { display: flex; gap: 10px; }

.btn {
    display: inline-flex; align-items: center; gap: 7px;
    font-family: 'Figtree', sans-serif; font-size: 0.875rem; font-weight: 500;
    padding: 10px 20px; border-radius: var(--radius-sm);
    border: 1px solid transparent; cursor: pointer; text-decoration: none; transition: all .2s;
}
.btn-primary { background: var(--periwinkle); color: #fff; box-shadow: 0 4px 14px rgba(100,120,212,0.28); }
.btn-primary:hover { background: #7389e0; transform: translateY(-1px); }
.btn-ghost { background: rgba(255,255,255,0.6); border-color: var(--glass-border); color: var(--slate); }
.btn-ghost:hover { background: rgba(255,255,255,0.9); color: var(--navy); }
.btn-danger { background: rgba(192,80,90,0.08); border-color: rgba(192,80,90,0.2); color: var(--danger); }
.btn-danger:hover { background: rgba(192,80,90,0.16); }

@keyframes fadeUp { to { opacity: 1; transform: translateY(0); } }
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

    <div class="breadcrumb">
        <a href="{{ route('articles.index') }}">Articles</a>
        <span>›</span>
        <span>{{ Str::limit($article->title, 40) }}</span>
    </div>

    <div class="article-header">
        <div class="article-meta">
            <span class="badge">{{ $article->type->name }}</span>
            <span class="meta-sep"></span>
            <span class="article-date">{{ $article->created_at->format('d M Y') }}</span>
            <span class="meta-sep"></span>
            <span class="article-author">Par <strong>{{ $article->user->name }}</strong></span>
        </div>
        <h1 class="article-title">{{ $article->title }}</h1>
    </div>

    @if($article->image)
        <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }}" class="article-cover">
    @endif

    <div class="article-body">
        <p>{{ $article->content }}</p>
    </div>

    <div class="article-actions">
        <a href="{{ route('articles.index') }}" class="btn btn-ghost">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M19 12H5M12 19l-7-7 7-7"/></svg>
            Retour à la liste
        </a>
        <div class="action-group">
            <a href="{{ route('articles.edit', $article) }}" class="btn btn-primary">
                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
                Modifier
            </a>
            <form action="{{ route('articles.destroy', $article) }}" method="POST" style="display:inline">
                @csrf @method('DELETE')
                <button type="submit" class="btn btn-danger"
                    onclick="return confirm('Supprimer définitivement cet article ?')">
                    <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="3 6 5 6 21 6"/><path d="M19 6l-1 14H6L5 6"/><path d="M10 11v6M14 11v6"/><path d="M9 6V4h6v2"/></svg>
                    Supprimer
                </button>
            </form>
        </div>
    </div>

</div>
</body>
</html>