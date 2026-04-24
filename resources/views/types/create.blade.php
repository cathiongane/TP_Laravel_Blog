<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Créer un type — Corpus</title>
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
    --sage:         #5a9e82;
    --shadow-md:    0 8px 32px rgba(60,80,140,0.10);
    --radius:       18px;
    --radius-sm:    11px;
}
body { font-family: 'Figtree', sans-serif; background: var(--bg); color: var(--navy); min-height: 100vh; }
body::before {
    content: ''; position: fixed; inset: 0; z-index: 0; pointer-events: none;
    background:
        radial-gradient(ellipse 60% 50% at 80% 15%, rgba(90,158,130,0.08) 0%, transparent 55%),
        radial-gradient(ellipse 70% 50% at 5% 80%, rgba(100,120,212,0.08) 0%, transparent 60%);
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

.wrap { position: relative; z-index: 1; max-width: 500px; margin: 0 auto; padding: 96px 24px 64px; }

.breadcrumb {
    display: flex; align-items: center; gap: 8px;
    font-size: 0.8rem; color: var(--muted); margin-bottom: 28px;
    animation: fadeUp .4s ease forwards; opacity: 0;
}
.breadcrumb a { color: var(--muted); text-decoration: none; transition: color .2s; }
.breadcrumb a:hover { color: var(--periwinkle); }
.breadcrumb span { color: var(--navy); font-weight: 500; }

.page-title {
    font-family: 'Instrument Serif', serif; font-size: 2rem; font-weight: 400;
    color: var(--navy); margin-bottom: 8px;
    animation: fadeUp .4s ease .05s forwards; opacity: 0; transform: translateY(12px);
}
.page-subtitle {
    font-size: 0.875rem; color: var(--muted); margin-bottom: 32px;
    animation: fadeUp .4s ease .08s forwards; opacity: 0;
}

/* Tip box */
.tip-box {
    display: flex; gap: 12px; align-items: flex-start;
    background: var(--periwinkle-g); border: 1px solid rgba(100,120,212,0.2);
    border-radius: var(--radius-sm); padding: 14px 16px;
    margin-bottom: 24px;
    animation: fadeUp .4s ease .1s forwards; opacity: 0;
}
.tip-icon { font-size: 1rem; flex-shrink: 0; margin-top: 1px; }
.tip-text { font-size: 0.82rem; color: var(--periwinkle); line-height: 1.55; }

.form-card {
    background: var(--glass); border: 1px solid var(--glass-border);
    border-radius: var(--radius); backdrop-filter: blur(20px) saturate(160%);
    box-shadow: var(--shadow-md); padding: 32px;
    animation: fadeUp .45s ease .12s forwards; opacity: 0; transform: translateY(14px);
}

.form-group { margin-bottom: 0; }
.form-label {
    display: block; font-size: 0.77rem; font-weight: 600; color: var(--muted);
    text-transform: uppercase; letter-spacing: .07em; margin-bottom: 9px;
}
.form-input {
    width: 100%; background: rgba(255,255,255,0.55);
    border: 1.5px solid var(--glass-border); border-radius: var(--radius-sm);
    padding: 13px 16px; color: var(--navy); font-family: 'Figtree', sans-serif;
    font-size: 1rem; outline: none; transition: all .2s;
}
.form-input:focus {
    background: rgba(255,255,255,0.95); border-color: var(--periwinkle);
    box-shadow: 0 0 0 3px rgba(100,120,212,0.12);
}
.form-input::placeholder { color: var(--muted); }

/* Preview */
.preview-row {
    display: flex; align-items: center; gap: 10px;
    padding: 14px 0; margin-top: 18px;
    border-top: 1px solid rgba(180,190,220,0.3);
}
.preview-label { font-size: 0.78rem; color: var(--muted); }
.preview-badge {
    display: inline-block; padding: 4px 12px; border-radius: 20px;
    font-size: 0.74rem; font-weight: 600; letter-spacing: .04em;
    background: var(--periwinkle-g); border: 1px solid rgba(100,120,212,0.2);
    color: var(--periwinkle);
    transition: all .2s;
}

.form-actions { display: flex; justify-content: flex-end; align-items: center; gap: 12px; margin-top: 24px; }
.btn {
    display: inline-flex; align-items: center; gap: 7px;
    font-family: 'Figtree', sans-serif; font-size: 0.875rem; font-weight: 500;
    padding: 10px 22px; border-radius: var(--radius-sm);
    border: 1px solid transparent; cursor: pointer; text-decoration: none; transition: all .2s;
}
.btn-primary { background: var(--periwinkle); color: #fff; box-shadow: 0 4px 14px rgba(100,120,212,0.28); }
.btn-primary:hover { background: #7389e0; box-shadow: 0 6px 22px rgba(100,120,212,0.4); transform: translateY(-1px); }
.btn-ghost { background: rgba(255,255,255,0.6); border-color: var(--glass-border); color: var(--slate); }
.btn-ghost:hover { background: rgba(255,255,255,0.9); color: var(--navy); }

@keyframes fadeUp { to { opacity: 1; transform: translateY(0); } }
</style>
</head>
<body>

<nav>
    <a href="#" class="nav-brand">Corpus</a>
    <div class="nav-links">
        <a href="{{ route('articles.index') }}">Articles</a>
        <a href="{{ route('types.index') }}" class="active">Types</a>
    </div>
</nav>

<div class="wrap">

    <div class="breadcrumb">
        <a href="{{ route('types.index') }}">Types</a>
        <span>›</span>
        <span>Nouveau type</span>
    </div>

    <h1 class="page-title">Créer un type</h1>
    <p class="page-subtitle">Les types permettent de catégoriser vos articles.</p>

    <div class="tip-box">
        <span class="tip-icon">💡</span>
        <span class="tip-text">Choisissez un nom court et descriptif — il apparaîtra sous forme de badge sur chaque article.</span>
    </div>

    @if($errors->any())
    <div style="background:rgba(192,80,90,0.07);border:1px solid rgba(192,80,90,0.2);border-radius:11px;padding:14px 18px;margin-bottom:20px">
        <ul style="list-style:none">
            @foreach($errors->all() as $error)
                <li style="font-size:.85rem;color:#c0505a;padding:3px 0">— {{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('types.store') }}" method="POST">
        @csrf
        <div class="form-card">
            <div class="form-group">
                <label class="form-label" for="name">Nom du type</label>
                <input type="text" id="name" name="name" class="form-input"
                    placeholder="Ex : Actualité, Tutoriel, Analyse…"
                    value="{{ old('name') }}"
                    required autocomplete="off"
                    oninput="document.getElementById('badge-preview').textContent = this.value || 'Aperçu'">

                <div class="preview-row">
                    <span class="preview-label">Aperçu :</span>
                    <span class="preview-badge" id="badge-preview">Aperçu</span>
                </div>
            </div>
        </div>

        <div class="form-actions">
            <a href="{{ route('types.index') }}" class="btn btn-ghost">Annuler</a>
            <button type="submit" class="btn btn-primary">
                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
                Créer le type
            </button>
        </div>
    </form>

</div>
</body>
</html>