<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Types — Corpus</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Instrument+Serif:ital@0;1&family=Figtree:wght@300;400;500;600&display=swap" rel="stylesheet">
<style>
*, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
:root {
    --bg:           #f2f4f8;
    --glass:        rgba(255,255,255,0.72);
    --glass-hover:  rgba(255,255,255,0.90);
    --glass-border: rgba(180,190,220,0.45);
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
body { font-family: 'Figtree', sans-serif; background: var(--bg); color: var(--navy); min-height: 100vh; }
body::before {
    content: ''; position: fixed; inset: 0; z-index: 0; pointer-events: none;
    background:
        radial-gradient(ellipse 60% 50% at 90% 10%, rgba(90,158,130,0.08) 0%, transparent 55%),
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

.wrap { position: relative; z-index: 1; max-width: 680px; margin: 0 auto; padding: 96px 24px 64px; }

.page-head {
    display: flex; justify-content: space-between; align-items: flex-end;
    margin-bottom: 32px;
    animation: fadeUp .45s ease forwards; opacity: 0; transform: translateY(14px);
}
.page-head h1 { font-family: 'Instrument Serif', serif; font-size: 2rem; font-weight: 400; color: var(--navy); }
.page-head p { font-size: 0.85rem; color: var(--muted); margin-top: 3px; }

.alert-success {
    display: flex; align-items: center; gap: 10px;
    padding: 12px 18px; background: rgba(90,158,130,0.10);
    border: 1px solid rgba(90,158,130,0.25);
    border-radius: var(--radius-sm); color: var(--sage);
    font-size: 0.875rem; font-weight: 500; margin-bottom: 24px;
    animation: fadeUp .3s ease forwards; opacity: 0;
}
.alert-success::before { content: '✓'; font-weight: 700; }

/* Types list */
.types-card {
    background: var(--glass); border: 1px solid var(--glass-border);
    border-radius: var(--radius); backdrop-filter: blur(20px) saturate(160%);
    box-shadow: var(--shadow-md); overflow: hidden;
    animation: fadeUp .5s ease .08s forwards; opacity: 0; transform: translateY(14px);
}
.types-list { list-style: none; }
.type-item {
    display: flex; align-items: center; justify-content: space-between;
    padding: 16px 24px;
    border-bottom: 1px solid rgba(180,190,220,0.25);
    transition: background .15s;
}
.type-item:last-child { border-bottom: none; }
.type-item:hover { background: rgba(255,255,255,0.5); }

.type-left { display: flex; align-items: center; gap: 14px; }
.type-dot {
    width: 10px; height: 10px; border-radius: 50%;
    background: linear-gradient(135deg, var(--periwinkle), var(--rose));
    flex-shrink: 0;
}
.type-name { font-size: 0.95rem; font-weight: 500; color: var(--navy); }
.type-count { font-size: 0.78rem; color: var(--muted); margin-top: 1px; }

.type-actions { display: flex; gap: 8px; }

/* Empty in list */
.types-empty {
    padding: 48px 24px; text-align: center;
}
.types-empty p { font-size: 0.9rem; color: var(--muted); }

/* Buttons */
.btn {
    display: inline-flex; align-items: center; gap: 7px;
    font-family: 'Figtree', sans-serif; font-size: 0.83rem; font-weight: 500;
    padding: 8px 18px; border-radius: var(--radius-sm);
    border: 1px solid transparent; cursor: pointer; text-decoration: none; transition: all .2s;
}
.btn-primary { background: var(--periwinkle); color: #fff; box-shadow: 0 4px 14px rgba(100,120,212,0.28); }
.btn-primary:hover { background: #7389e0; box-shadow: 0 6px 22px rgba(100,120,212,0.4); transform: translateY(-1px); }
.btn-ghost { background: rgba(255,255,255,0.6); border-color: var(--glass-border); color: var(--slate); }
.btn-ghost:hover { background: rgba(255,255,255,0.9); color: var(--navy); }
.btn-danger { background: rgba(192,80,90,0.07); border-color: rgba(192,80,90,0.2); color: var(--danger); }
.btn-danger:hover { background: rgba(192,80,90,0.14); }
.btn-sm { padding: 5px 12px; font-size: 0.78rem; }

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

    @if(session('success'))
        <div class="alert-success">{{ session('success') }}</div>
    @endif

    <div class="page-head">
        <div>
            <h1>Types d'articles</h1>
            <p>{{ $types->count() }} type{{ $types->count() > 1 ? 's' : '' }} configuré{{ $types->count() > 1 ? 's' : '' }}</p>
        </div>
        <a href="{{ route('types.create') }}" class="btn btn-primary">
            <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
            Ajouter un type
        </a>
    </div>

    <div class="types-card">
        @if($types->isEmpty())
            <div class="types-empty">
                <p>Aucun type défini pour l'instant.</p>
            </div>
        @else
            <ul class="types-list">
                @foreach($types as $type)
                <li class="type-item">
                    <div class="type-left">
                        <div class="type-dot"></div>
                        <div>
                            <div class="type-name">{{ $type->name }}</div>
                        </div>
                    </div>
                    <div class="type-actions">
                        <form action="{{ route('types.destroy', $type) }}" method="POST" style="display:inline">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('Supprimer « {{ $type->name }} » ?')">
                                Supprimer
                            </button>
                        </form>
                    </div>
                </li>
                @endforeach
            </ul>
        @endif
    </div>

</div>
</body>
</html>