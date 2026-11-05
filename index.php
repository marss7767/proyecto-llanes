<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Control de Telón - EPET 34</title>
<style>
  *{box-sizing:border-box;}
  body{
    margin:0;font-family:'Segoe UI',system-ui,Arial,sans-serif;
    background:radial-gradient(circle at top,#1a1a2e 0%,#0a0a0a 60%);
    min-height:100vh;display:flex;flex-direction:column;
    justify-content:center;align-items:center;color:#fff;padding:20px;
  }
  h1{
    font-size:clamp(28px,6vw,42px);margin:0 0 6px;letter-spacing:1px;
    background:linear-gradient(90deg,#4facfe,#00f2fe);
    -webkit-background-clip:text;background-clip:text;color:transparent;
  }
  .subtitle{font-size:13px;opacity:.6;margin-bottom:34px;letter-spacing:2px;}
  .panel{display:flex;flex-direction:column;gap:16px;width:100%;max-width:340px;}
  .btn{
    width:100%;padding:18px 24px;border:none;border-radius:16px;
    font-size:17px;font-weight:700;letter-spacing:1px;cursor:pointer;
    transition:transform .15s,filter .15s;color:#fff;
    display:flex;align-items:center;justify-content:center;gap:10px;
  }
  .btn:active{transform:scale(.97);}
  .btn:disabled{opacity:.55;cursor:wait;}
  .btn-abrir {background:linear-gradient(135deg,#11998e,#38ef7d);box-shadow:0 8px 24px rgba(56,239,125,.25);}
  .btn-cerrar{background:linear-gradient(135deg,#2b5876,#4e4376);box-shadow:0 8px 24px rgba(78,67,118,.35);}
  .btn-parar {background:linear-gradient(135deg,#cb2d3e,#ef473a);box-shadow:0 8px 24px rgba(239,71,58,.30);}
  .btn:hover{filter:brightness(1.1);}
  .status{
    margin-top:28px;padding:14px 22px;border-radius:12px;
    background:rgba(255,255,255,.06);border:1px solid rgba(255,255,255,.1);
    font-size:14px;min-height:20px;text-align:center;transition:all .3s;
  }
  .status.ok  {color:#38ef7d;border-color:rgba(56,239,125,.4);}
  .status.err {color:#ef473a;border-color:rgba(239,71,58,.4);}
  .status.wait{color:#ffb800;border-color:rgba(255,184,0,.4);}
  .dot{display:inline-block;width:8px;height:8px;border-radius:50%;
    background:currentColor;margin-right:8px;animation:pulse 1.4s infinite;}
  @keyframes pulse{0%,100%{opacity:1;}50%{opacity:.3;}}
  .dock{
    position:fixed;bottom:20px;padding:10px 24px;
    background:rgba(255,255,255,.06);border:1px solid rgba(255,255,255,.1);
    border-radius:25px;backdrop-filter:blur(10px);
  }
  .dock a{color:#fff;text-decoration:none;font-weight:600;font-size:14px;}
  .dock a:hover{color:#4facfe;}
</style>
</head>
<body>
  <h1>Control de Telón</h1>
  <div class="subtitle">EPET N° 34</div>

  <div class="panel">
    <button class="btn btn-abrir"  onclick="accion('abrir',this)">⬆️ ABRIR TELÓN</button>
    <button class="btn btn-cerrar" onclick="accion('cerrar',this)">⬇️ CERRAR TELÓN</button>
    <button class="btn btn-parar"  onclick="accion('parar',this)">⏹️ PARAR</button>
  </div>

  <div id="status" class="status"><span class="dot"></span>Listo para recibir órdenes</div>

  <div class="dock"><a href="/">Inicio</a></div>

  <script>
    const statusEl = document.getElementById('status');
    function setStatus(msg, type){
      statusEl.className = 'status ' + (type || '');
      statusEl.innerHTML = '<span class="dot"></span>' + msg;
    }
    async function accion(cmd, btn){
      if (btn) btn.disabled = true;
      setStatus('Enviando "' + cmd + '"...', 'wait');
      try {
        const r = await fetch('/' + cmd, { cache:'no-store' });
        if (!r.ok) throw new Error('HTTP ' + r.status);
        const txt = await r.text();
        setStatus(txt || ('Orden "' + cmd + '" ejecutada'), 'ok');
      } catch (e) {
        setStatus('No se pudo conectar (' + e.message + ')', 'err');
      } finally {
        if (btn) btn.disabled = false;
      }
    }
  </script>
</body>
</html>
