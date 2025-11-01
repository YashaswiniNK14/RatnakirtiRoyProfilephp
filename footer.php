
<!-- footer2.php -->
<footer style="
  background:#0b1220;
  color:#e6eef8;
  padding:10px 25px;
  font-family: Arial, sans-serif;
  border-top:1px solid #1d2c44;
  position:fixed;
  bottom:0;
  right:0;
  left:0;
  z-index:100;
  font-size:0.9rem;
">
  <div style="text-align:right; line-height:1.4;">
    <div id="footer-location" style="color:#00e5ff;">Detecting your location…</div>
    <div id="footer-ip" style="color:#7fc8ff; margin-top:2px;"></div>
    <div style="color:#9aa7b2; font-size:0.8rem; margin-top:4px;">
      © 2025 Ratnakirti Roy | Location data is approximate.
    </div>
  </div>

  <script>
  (async function(){
    const locDiv = document.getElementById('footer-location');
    const ipDiv = document.getElementById('footer-ip');
    let locationText = 'unknown';
    let ipAddress = 'unknown';

    // 1️⃣ Try GPS-based location
    if (navigator.geolocation) {
      try {
        const pos = await new Promise((resolve, reject) =>
          navigator.geolocation.getCurrentPosition(resolve, reject, { timeout: 8000 })
        );
        const { latitude, longitude } = pos.coords;
        const res = await fetch(
          `https://nominatim.openstreetmap.org/reverse?format=jsonv2&lat=${latitude}&lon=${longitude}`
        );
        const data = await res.json();
        locationText = [
          data.address.city || data.address.town || data.address.village || data.address.county,
          data.address.state,
          data.address.country
        ].filter(Boolean).join(', ');
      } catch (err) {
        console.warn("Geolocation failed, using IP fallback…", err);
      }
    }

    // 2️⃣ Get IP info (always)
    try {
      const res = await fetch('https://ipapi.co/json/');
      const j = await res.json();
      ipAddress = j.ip || 'unknown';
      if (!locationText || locationText === 'unknown') {
        locationText = [j.city, j.region, j.country_name].filter(Boolean).join(', ') || 'Unknown Location';
      }
    } catch (err) {
      console.warn('IP lookup failed', err);
    }

    // 3️⃣ Display data
    locDiv.textContent = '🌍 ' + (locationText || 'Not Found');
    ipDiv.textContent = '💻 ' + (ipAddress || 'Not Found');
  })();
  </script>
</footer>
