<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Modifier le type — Corpus</title>
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
    --amber:        #d4924a;
    --amber-g:      rgba(212,146,74,0.10);
    --danger:       #c0505a;
    --shadow-md:    0 8px 32px rgba(60,80,140,0.10);
    --radius:       18px;
    --radius-sm:    11px;
}
body { font-family: 'Figtree', sans-serif; background: var(--bg); color: var(--navy); min-height: 100vh; }
body::before {
    content: ''; position: fixed; inset: 0; z-index: 0; pointer-events: none;
    background:
        radial-gradient(ellipse 60% 50% at 80% 15%, rgba(212,146,74,0.07) 0%, transparent 55%),
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

/* Edit mode banner */
.edit-banner {
    display: flex; align-items: center; gap: 10px;
    background: var(--amber-g); border: 1px solid rgba(212,146,74,0.22);
    border-radius: var(--radius-sm); padding: 11px 16px;
    margin-bottom: 24px; font-size: 0.83rem; color: var(--amber);
    animation: fadeUp .35s ease .05s forwards; opacity: 0;
}

.page-title {
    font-family: 'Instrument Serif', serif; font-size: 2rem; font-weight: 400;
    color: var(--navy); margin-bottom: 8px;
    animation: fadeUp .4s ease .05s forwards; opacity: 0; transform: translateY(12px);
}
.page-subtitle {
    font-size: 0.875rem; color: var(--muted); margin-bottom: 32px;
    animation: fadeUp .4s ease .08s forwards; opacity: 0;
}

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
    color: var(--periwinkle); transition: all .2s;
}

/* Danger zone */
.danger-zone {
    margin-top: 32px;
    background: rgba(192,80,90,0.04); border: 1px solid rgba(192,80,90,0.15);
    border-radius: var(--radius); padding: 22px 24px;
    animation: fadeUp .5s ease .2s forwards; opacity: 0;
}
.danger-zone-title { font-size: 0.77rem; font-weight: 600; text-transform: uppercase; letter-spacing: .07em; color: var(--danger); margin-bottom: 8px; }
.danger-zone p { font-size: 0.83rem; color: var(--slate); margin-bottom: 14px; line-height: 1.5; }

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
.btn-danger { background: rgba(192,80,90,0.08); border-color: rgba(192,80,90,0.2); color: var(--danger); }
.btn-danger:hover { background: rgba(192,80,90,0.16); }

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
        <span>{{ $type->name }}</span>
        <span>›</span>
        <span>Modifier</span>
    </div>

    <div class="edit-banner">
        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
        Modification de « {{ $type->name }} » — les articles liés seront mis à jour automatiquement.
    </div>

    <h1 class="page-title">Modifier le type</h1>
    <p class="page-subtitle">Renommez ce type de contenu.</p>

    @if($errors->any())
    <div style="background:rgba(192,80,90,0.07);border:1px solid rgba(192,80,90,0.2);border-radius:11px;padding:14px 18px;margin-bottom:20px">
        <ul style="list-style:none">
            @foreach($errors->all() as $error)
                <li style="font-size:.85rem;color:#c0505a;padding:3px 0">— {{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('types.update', $type) }}" method="POST">
        @csrf @method('PUT')
        <div class="form-card">
            <div class="form-group">
                <label class="form-label" for="name">Nom du type</label>
                <input type="text" id="name" name="name" class="form-input"
                    value="{{ old('name', $type->name) }}"
                    required autocomplete="off"
                    oninput="document.getElementById('badge-preview').textContent = this.value || 'Aperçu'">

                <div class="preview-row">
                    <span class="preview-label">Aperçu :</span>
                    <span class="preview-badge" id="badge-preview">{{ old('name', $type->name) }}</span>
                </div>
            </div>
        </div>

        <div class="form-actions">
            <a href="{{ route('types.index') }}" class="btn btn-ghost">Annuler</a>
            <button type="submit" class="btn btn-primary">
                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"/><polyline points="17 21 17 13 7 13 7 21"/></svg>
                Enregistrer
            </button>
        </div>
    </form>

    {{-- Danger zone --}}
    <div class="danger-zone">
        <div class="danger-zone-title">Zone de danger</div>
        <p>Supprimer ce type est une action irréversible. Les articles associés devront être réassignés manuellement.</p>
        <form action="{{ route('types.destroy', $type) }}" method="POST" style="display:inline">
            @csrf @method('DELETE')
            <button type="submit" class="btn btn-danger"
                onclick="return confirm('Supprimer définitivement « {{ $type->name }} » ?')">
                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="3 6 5 6 21 6"/><path d="M19 6l-1 14H6L5 6"/><path d="M10 11v6M14 11v6"/><path d="M9 6V4h6v2"/></svg>
                Supprimer ce type
            </button>
        </form>
    </div>

</div>
</body>
</html>