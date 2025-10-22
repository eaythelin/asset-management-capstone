const DATA = {
  furniture: { labels: ['Chairs','Desks','Cabinets'], values: [12,6,3] },
  it_equipment: { labels: ['Laptops','Monitors','Printers', 'Desktop', 'Mouse'], values: [8,10,4,10,15] },
  vehicles: { labels: ['Cars','Motorcycles'], values: [3,1] }
};

// Populate table
function renderTable(category) {
  const tbody = document.getElementById('subcategoryTable');
  tbody.innerHTML = '';
  const { labels, values } = DATA[category];
  labels.forEach((label, i) => {
    const tr = document.createElement('tr');
    tr.innerHTML = `<td class="p-3 text-sm md:text-base">${label}</td><td class="p-3 text-sm md:text-base">${values[i]}</td>`;
    tbody.appendChild(tr);
  });
}

// Initialize
document.addEventListener('DOMContentLoaded', () => {
  const sel = document.getElementById('category');
  renderTable(sel.value);

  sel.addEventListener('change', e => renderTable(e.target.value));
});
