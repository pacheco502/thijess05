from pathlib import Path
path = Path('view/chatbot.php')
lines = path.read_text(encoding='latin-1').splitlines()
indices = [i for i, line in enumerate(lines) if 'async function prepararModalPromocoes' in line]
if len(indices) < 2:
    raise SystemExit('expected duplicate function')
start = indices[0]
end = indices[1]
# remove lines start .. end-1
del lines[start:end]
text = '\r\n'.join(lines) + '\r\n'
path.write_text(text, encoding='latin-1')
