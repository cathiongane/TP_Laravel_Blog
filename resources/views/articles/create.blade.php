<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Créer un article — Corpus</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Instrument+Serif:ital@0;1&family=Figtree:wght@300;400;500;600&display=swap" rel="stylesheet">
<style>
*, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
:root {
    --bg:           #f2f4f8;
    --glass:        rgba(255,255,255,0.72);
    --glass-border: rgba(180,190,220,0.45);
    --glass-border-h:rgba(100,120,212,0.45);
    --navy:         #2d3a5e;
    --slate:        #4a5880;
    --muted:        #8d98b8;
    --periwinkle:   #6478d4;
    --periwinkle-g: rgba(100,120,212,0.10);
    --rose:         #c8708a;
    --sage:         #5a9e82;
    --danger:       #c0505a;
    --shadow-md:    0 8px 32px rgba(60,80,140,0.10);
    --radius:       18px;
    --radius-sm:    11px;
}
body {
    font-family: 'Figtree', sans-serif;
    background: var(--bg); color: var(--navy); min-height: 100vh;
}
body::before {
    content: ''; position: fixed; inset: 0; z-index: 0; pointer-events: none;
    background:
        radial-gradient(ellipse 70% 50% at 10% 20%, rgba(100,120,212,0.09) 0%, transparent 60%),
        radial-gradient(ellipse 60% 50% at 85% 75%, rgba(200,112,138,0.07) 0%, transparent 60%);
}
nav {
    position: fixed; top: 0; left: 0; right: 0; z-index: 100;
    height: 62px; background: rgba(242,244,248,0.82);
    backdrop-filter: blur(24px) saturate(180%);
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
    border-radius: 8px; display: inline-block;
    box-shadow: 0 4px 12px rgba(100,120,212,0.3);
}
.nav-links { display: flex; gap: 4px; }
.nav-links a {
    font-size: 0.83rem; font-weight: 500; color: var(--slate); text-decoration: none;
    padding: 6px 14px; border-radius: 8px; border: 1px solid transparent; transition: all .2s;
}
.nav-links a:hover { background: var(--glass); border-color: var(--glass-border); color: var(--navy); }
.nav-links a.active { background: var(--periwinkle-g); border-color: rgba(100,120,212,0.25); color: var(--periwinkle); }

.wrap {
    position: relative; z-index: 1;
    max-width: 680px; margin: 0 auto;
    padding: 96px 24px 64px;
}

/* Breadcrumb */
.breadcrumb {
    display: flex; align-items: center; gap: 8px;
    font-size: 0.8rem; color: var(--muted);
    margin-bottom: 28px;
    animation: fadeUp .4s ease forwards; opacity: 0;
}
.breadcrumb a { color: var(--muted); text-decoration: none; transition: color .2s; }
.breadcrumb a:hover { color: var(--periwinkle); }
.breadcrumb span { color: var(--navy); font-weight: 500; }
.breadcrumb-sep { opacity: .4; }

.page-title {
    font-family: 'Instrument Serif', serif;
    font-size: 2rem; font-weight: 400;
    color: var(--navy); margin-bottom: 32px;
    animation: fadeUp .4s ease .05s forwards; opacity: 0; transform: translateY(12px);
}

/* Errors */
.errors {
    background: rgba(192,80,90,0.07);
    border: 1px solid rgba(192,80,90,0.2);
    border-radius: var(--radius-sm);
    padding: 14px 18px; margin-bottom: 24px;
    animation: fadeUp .3s ease forwards; opacity: 0;
}
.errors p { font-size: 0.78rem; font-weight: 600; color: var(--danger); margin-bottom: 6px; text-transform: uppercase; letter-spacing: .05em; }
.errors ul { list-style: none; }
.errors li { font-size: 0.85rem; color: var(--danger); padding: 3px 0; display: flex; gap: 6px; }
.errors li::before { content: '—'; opacity: .5; }

/* Form card */
.form-card {
    background: var(--glass);
    border: 1px solid var(--glass-border);
    border-radius: var(--radius);
    backdrop-filter: blur(20px) saturate(160%);
    box-shadow: var(--shadow-md);
    padding: 36px;
    animation: fadeUp .45s ease .1s forwards; opacity: 0; transform: translateY(14px);
}

.form-group { margin-bottom: 24px; }
.form-label {
    display: flex; align-items: center; gap: 6px;
    font-size: 0.77rem; font-weight: 600;
    color: var(--muted); text-transform: uppercase;
    letter-spacing: .07em; margin-bottom: 9px;
}
.badge-optional {
    font-size: 0.68rem; font-weight: 400; text-transform: none; letter-spacing: 0;
    padding: 2px 7px; border-radius: 20px;
    background: rgba(141,152,184,0.12); color: var(--muted);
}

.form-input {
    width: 100%;
    background: rgba(255,255,255,0.55);
    border: 1.5px solid var(--glass-border);
    border-radius: var(--radius-sm);
    padding: 12px 16px; color: var(--navy);
    font-family: 'Figtree', sans-serif; font-size: 0.9rem;
    outline: none; transition: all .2s;
}
.form-input:focus {
    background: rgba(255,255,255,0.9);
    border-color: var(--periwinkle);
    box-shadow: 0 0 0 3px rgba(100,120,212,0.12);
}
.form-input::placeholder { color: var(--muted); }
textarea.form-input { resize: vertical; min-height: 150px; line-height: 1.65; }
select.form-input option { background: #fff; color: var(--navy); }

/* File drop zone */
.file-zone {
    border: 1.5px dashed var(--glass-border);
    border-radius: var(--radius-sm);
    padding: 32px 20px;
    text-align: center; cursor: pointer;
    transition: all .2s; position: relative;
    background: rgba(255,255,255,0.3);
}
.file-zone:hover { border-color: var(--periwinkle); background: rgba(100,120,212,0.04); }
.file-zone input { position: absolute; inset: 0; opacity: 0; cursor: pointer; }
.file-zone-icon { font-size: 2rem; margin-bottom: 8px; }
.file-zone-text { font-size: 0.85rem; color: var(--slate); }
.file-zone-hint { font-size: 0.77rem; color: var(--muted); margin-top: 4px; }

/* Divider */
.form-divider {
    height: 1px;
    background: linear-gradient(to right, transparent, var(--glass-border), transparent);
    margin: 28px 0;
}

/* Actions */
.form-actions {
    display: flex; justify-content: flex-end; align-items: center; gap: 12px;
}
.btn {
    display: inline-flex; align-items: center; gap: 7px;
    font-family: 'Figtree', sans-serif; font-size: 0.875rem; font-weight: 500;
    padding: 10px 22px; border-radius: var(--radius-sm);
    border: 1px solid transparent; cursor: pointer;
    text-decoration: none; transition: all .2s;
}
.btn-primary {
    background: var(--periwinkle); color: #fff;
    box-shadow: 0 4px 14px rgba(100,120,212,0.28);
}
.btn-primary:hover { background: #7389e0; box-shadow: 0 6px 22px rgba(100,120,212,0.4); transform: translateY(-1px); }
.btn-ghost {
    background: rgba(255,255,255,0.6); border-color: var(--glass-border); color: var(--slate);
}
.btn-ghost:hover { background: rgba(255,255,255,0.9); color: var(--navy); }

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
        <span class="breadcrumb-sep">›</span>
        <span>Nouvel article</span>
    </div>

    <h1 class="page-title">Créer un article</h1>

    @if($errors->any())
    <div class="errors">
        <p>Erreurs de validation</p>
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('articles.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-card">

            <div class="form-group">
                <label class="form-label">Titre</label>
                <input type="text" name="title" class="form-input"
                    placeholder="Entrez le titre de l'article…"
                    value="{{ old('title') }}" required>
            </div>

            <div class="form-group">
                <label class="form-label">Contenu</label>
                <textarea name="content" class="form-input"
                    placeholder="Rédigez votre contenu ici…"
                    required>{{ old('content') }}</textarea>
            </div>

            <div class="form-group">
                <label class="form-label">Type</label>
                <select name="type_id" class="form-input" required>
                    <option value="">— Choisir un type —</option>
                    @foreach($types as $type)
                        <option value="{{ $type->id }}" {{ old('type_id') == $type->id ? 'selected' : '' }}>
                            {{ $type->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-divider"></div>

            <div class="form-group" style="margin-bottom:0">
                <label class="form-label">
                    Image de couverture
                    <span class="badge-optional">Optionnel</span>
                </label>
                <div class="file-zone">
                    <input type="file" name="image" accept="image/*">
                    <div class="file-zone-icon">🖼</div>
                    <div class="file-zone-text">Glissez une image ou cliquez pour parcourir</div>
                    <div class="file-zone-hint">PNG, JPG, WEBP — max 2 Mo</div>
                </div>
            </div>

        </div>

        <div class="form-actions" style="margin-top:24px">
            <a href="{{ route('articles.index') }}" class="btn btn-ghost">Annuler</a>
            <button type="submit" class="btn btn-primary">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M12 5v14M5 12l7 7 7-7"/></svg>
                Publier l'article
            </button>
        </div>
    </form>

</div>
</body>
</html>