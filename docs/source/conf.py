# Configuration file for the Sphinx documentation builder.

# -- Project information

project = 'Admitad API PHP Client'
copyright = '2024, Affiliate Forge'
author = 'Gleb Tuchinskii'

release = '1.0'
version = '1.0.4'

# -- General configuration

extensions = [
    'sphinx.ext.duration',
    'sphinx.ext.doctest',
    'sphinx.ext.autodoc',
    'sphinx.ext.autosummary',
    'sphinx.ext.intersphinx',
    "myst_parser",
]

intersphinx_mapping = {
    'python': ('https://docs.python.org/3/', None),
    'sphinx': ('https://www.sphinx-doc.org/en/master/', None),
}
intersphinx_disabled_domains = ['std']

templates_path = ['_templates']

# -- Options for HTML output
#html_theme = 'sphinx_book_theme'

# -- Options for EPUB output
#epub_show_urls = 'footnote'